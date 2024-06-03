<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AppraisalAttribute;
use App\Models\Department;
use App\Models\Director;
use App\Models\Goal;
use App\Models\Project;
use App\Models\Report;
use App\Models\Staff;
use App\Models\SubDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{




    public function greeting()
    {
        $time = date('H');
        if($time < 12){
            return 'Good Morning';
        }
        if($time >= 12 && $time < 17){
            return 'Good Afternoon';
        }
        if($time >= 17 && $time < 19){
            return 'Good Evening';
        }

        return 'Good Night';
    }

    public function statisticsCard()
    {
        $staff = Session::get('staff');
        $goals = Goal::where('staff_id', $staff->id)->latest('start_date')->get();
        $pending = [];
        $reports = Report::where('staff_id', $staff->id)->latest()->get();
        foreach($goals as $goal){
            if($goal->status == 'in_progress'){
                array_push($pending, $goal);
            }
        }

        return [
            'goals' => $goals->count(),
            'pending' => $pending,
            'reports' => $reports
        ];
    }

    public function adminDashboardCard()
    {
        $departments = Department::count();
        $staff = Staff::count();
        $projects = Project::count();
        $sub_departments = SubDepartment::count();
        $appraisals = AppraisalAttribute::count();
        $reports = Report::count();

        return [
            'departments' => $departments,
            'staff' => $staff,
            'appraisals' => $appraisals,
            'projects' => $projects,
            'sub_departments' => $sub_departments,
            'reports' => $reports
        ];
    }

    public function changePassword()
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();



        $data['page_title'] = 'Security Settings';
        return view('admin.passwords', $data);
    }
    public function updatePassword(Request $request)
    {
        if(Session::get('admin') != NULL){
            $id = Session::get('admin')->id;
            $user = Admin::find($id);
            if (!$user) {
                return back()->with('error', 'Admin Account not found');
            }
        }else{
            $id = Session::get('director')->id;
            $user = Director::find($id);
            if (!$user) {
                return back()->with('error', 'Director Account not found');
            }
        }
        // Check if the user exists

        // Validate request data
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => [
                'required',
                'min:6',
                'different:old_password',
            ],
            'password_confirm' => 'required|same:password',
        ],[
            'old_password.required' => 'Please enter your current password.',
            'password.required' => 'Please enter a new password.',
            'password.min' => 'Your new password must be at least :min characters.',
            'password.different' => 'Your new password cannot be the same as your old password.',
            'password_confirm.required' => 'Please confirm your new password.',
            'password_confirm.same' => 'Your new password and confirmation password do not match.',
        ]);

        // Verify old password
        if (!Hash::check($validatedData['old_password'], $user->password)) {
            return back()->with('error', 'Old password is incorrect.');

        }

        // Update password
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        return back()->with('message', 'Password updated successfully.');

    }
}
