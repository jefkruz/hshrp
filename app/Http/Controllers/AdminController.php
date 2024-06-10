<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\AppraisalAttribute;
use App\Models\Department;
use App\Models\Director;
use App\Models\Goal;
use App\Models\Project;
use App\Models\Report;
use App\Models\Staff;
use App\Models\SubDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $m = new MenuController();
        $d = new DashboardController();
        $data['cards'] = $d->adminDashboardCard();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Dashboard';
        return view('admin.dashboard', $data);
    }

    public function departments()
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Units';
        $data['departments'] = Department::all();
        $data['subs'] = SubDepartment::all();
        $data['view_route'] = session('admin') ? 'admin.view_department' : 'director.view_department';
        return view('admin.departments', $data);
    }

    public function viewDepartment($id)
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'View Unit';
        $data['department'] = Department::findOrFail($id);
        return view('admin.view_department', $data);
    }

    public function projects()
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Projects';
        $data['projects'] = Project::all();
        return view('admin.projects', $data);
    }
    public function reports()
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Grade Reports';
        $data['reports'] = Report::all();
        $data['staffs'] = Staff::all();
        $data['units'] = Department::all();
        return view('admin.reports', $data);
    }
    public function viewReports($id)
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'View Reports';
        $data['reports'] = Report::where('staff_id',$id)->get();
        return view('admin.view_reports', $data);
    }

    public function director()
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Director Profile';
        $data['director'] = Director::first();
        return view('admin.director', $data);
    }

    public function updateDirector(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'office' => 'required'
        ]);

        $director = Director::first();
        $director->title = $request->title;
        $director->firstname = $request->firstname;
        $director->lastname = $request->lastname;
        $director->office = $request->office;
        $director->save();

        return back()->with('message', 'Director info updated');

    }

    public function staff()
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Staff';
        $data['staff'] = Staff::all();
        $data['departments'] = Department::all();
        $data['view_route'] = session('admin') ? 'admin.viewStaff' : 'director.viewStaff';
        return view('admin.staff', $data);
    }

    public function viewStaff($id)
    {
        $m = new MenuController();
        $s = new StaffController();
        $member_data = $s->fetchTeamMember($id);
        $data['member_data'] = $member_data;
        $data['canAppraise'] = (session('director') && $member_data['member']->is_leader == 'yes') ? true : false;
        $data['appraisals'] = Appraisal::where('staff_id', $id)->get();
        $data['appraisal_attributes'] = AppraisalAttribute::all();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'View Staff';
        return view('admin.view_staff', $data);
    }

    public function staffDelete($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return back()->with('message', 'Staff deleted');
    }

    public function viewGoal($id)
    {
        $m = new MenuController();
        $goal = Goal::findOrFail($id);
        $data['reports'] = Report::where('goal_id', $goal->id)->get();
        $data['page_title'] = 'View Goal';
        $data['menu'] = $m->fetchMenu();
        $data['goal'] = $goal;
        return view('admin.view_goal', $data);
    }

    public function viewAppraisal($id)
    {
        $m = new MenuController();
        $a = new AppraisalController();
        $appraisal = $a->directorViewAppraisal($id);
        $attributes = AppraisalAttribute::all();
        $score = 0;
        $scores = explode(",",$appraisal->scores);
        foreach($scores as $sc){
            $score += $sc;
        }
        $total = ($score / count($attributes)) * 10;
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'View Appraisal';
        $data['appraisal'] = $appraisal;
        $data['appraisal_attributes'] = $attributes;
        $data['total'] = $total;
        return view('admin.view_appraisal', $data);
    }

    public function platform()
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Platform Settings';
        $data['attributes'] = AppraisalAttribute::all();
        return view('admin.platform', $data);
    }

    public function appraisal()
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Appraisal Attributes';
        $data['attributes'] = AppraisalAttribute::all();
        return view('admin.platform', $data);
    }

    public function subDepartment()
    {
        $m = new MenuController();
        $data['menu'] = $m->fetchMenu();
        $data['page_title'] = 'Sub Departments';
        $data['subs'] = SubDepartment::all();
        return view('admin.sub-department', $data);
    }
}
