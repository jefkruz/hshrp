<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Director;
use App\Models\Goal;
use App\Models\MaritalProfile;
use App\Models\MinistryProfile;
use App\Models\Project;
use App\Models\ProjectTeam;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    public function getProfile($staff)
    {
        $department = Department::find($staff->department_id);
        if($staff->is_leader == 'yes'){
            $superior = Director::first();
        } else {
            $superior = Staff::find($department->leader_id);
        }

        return [
            'department' => $department,
            'is_leader' => $staff->is_leader == 'yes',
            'superior' => $superior
        ];
    }

    public function fetchTeam($staff)
    {
        $team = Staff::where('department_id', $staff->department_id)->get();
        return $team;
    }

    public function fetchTeamMember($id)
    {
        $staff = Staff::findOrFail($id);
        $projects = Project::where('project_teams.staff_id', $staff->id)
            ->join('project_teams', 'project_teams.project_id', '=', 'projects.id')
            ->select('projects.*', 'project_teams.staff_id', 'project_teams.project_id')->get();
        $goals = $goals = Goal::where('staff_id', $staff->id)->get();

        return [
            'member' => $staff,
            'projects' => $projects,
            'goals' => $goals
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'department_id' => 'required',
        ]);

        $staffExists = Staff::where('username', $request->username)->exists();
        if($staffExists){
            return back()->with('error', 'KC Username exists');
        }

        $staff = new Staff();
        $staff->title = $request->title;
        $staff->firstname = $request->firstname;
        $staff->lastname = $request->lastname;
        $staff->username = $request->username;
        $staff->email = $request->email;
        $staff->department_id = $request->department_id;
        $staff->save();

        return back()->with('message', 'Staff has been added');
    }

    public function updateBasicProfile(Request $request)
    {

        $request->validate([

            'title' => 'required|string',

            'middlename' => 'required|string',
            'email' => 'required|email',
            'alt_email' => 'required|email',
            'phone' => 'required|string',
            'kc_phone' => 'required|string',
            'portal_id' => 'required',
            'dob' => 'required',
            'house_address' => 'required|string',
            'bus_stop' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'height' => 'required|string',
            'weight' => 'required|string',
            'shirt_size' => 'required|string',
            'dress_size' => 'required|string',
        ]);


        // Assume $staff is an instance of your Staff model retrieved from the session
        $staff = Session::get('staff');

        // Handle the profile picture upload if a new file is provided
        if ($request->hasFile('profile_pic')) {
            $profilePicPath = $request->file('profile_pic')->store('profile_pics', env('DEFAULT_DISK'));
            $staff->profile_pic = url($profilePicPath);
        }

        // Update the staff member's information
        $staff->title = $request->input('title');
        $staff->middlename = $request->input('middlename');
        $staff->alt_email = $request->input('alt_email');
        $staff->phone = $request->input('phone');
        $staff->kc_phone = $request->input('kc_phone');
        $staff->portal_id = $request->input('portal_id');
        $staff->dob = $request->input('dob');
        $staff->house_address = $request->input('house_address');
        $staff->bus_stop = $request->input('bus_stop');
        $staff->city = $request->input('city');
        $staff->country = $request->input('country');
        $staff->height = $request->input('height');
        $staff->weight = $request->input('weight');
        $staff->shirt_size = $request->input('shirt_size');
        $staff->dress_size = $request->input('dress_size');

        $staff->save();
        Session::put('staff', $staff);



        return back()->with('message', 'Profile updated successfully');
    }

    public function updateMinistryProfile(Request $request)
    {
        // Validate the request data
        $request->validate([
            'church' => 'required|string|max:255',
            'zone' => 'required|string|max:255',
            'pastor' => 'required|string|max:255',
            'cell_leader' => 'required|string|max:255',
            'cell_responsibility' => 'required|string|max:255',
            'born_again_where' => 'required|string|max:255',
            'born_again_year' => 'required|integer|min:1900|max:' . date('Y'),
            'foundation_school_where' => 'required|string|max:255',
            'foundation_school_year' => 'required|integer|min:1900|max:' . date('Y'),
            'baptised_where' => 'required|string|max:255',
            'baptised_year' => 'required|integer|min:1900|max:' . date('Y'),
            'ministry_year' => 'required|integer|min:1900|max:' . date('Y'),
            'employment_year' => 'required|integer|min:1900|max:' . date('Y'),
            'department_year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Retrieve the staff record from the session
        $user = Session::get('staff');

        $exists = MinistryProfile::where('staff_id', $user->id)->first();

        if ($exists) {
            $staff = $exists;
        }
        else{
            $staff = new MinistryProfile();
        }


        $staff->staff_id = $user->id;
        $staff->church = $request->church;
        $staff->zone = $request->zone;
        $staff->pastor = $request->pastor;
        $staff->cell_leader = $request->cell_leader;
        $staff->cell_responsibility = $request->cell_responsibility;
        $staff->born_again_where = $request->born_again_where;
        $staff->born_again_year = $request->born_again_year;
        $staff->foundation_school_where = $request->foundation_school_where;
        $staff->foundation_school_year = $request->foundation_school_year;
        $staff->baptised_where = $request->baptised_where;
        $staff->baptised_year = $request->baptised_year;
        $staff->ministry_year = $request->ministry_year;
        $staff->employment_year = $request->employment_year;
        $staff->department_year =$request->department_year;

        $staff->save();

//        Session::put('staff',  $staff);

        // Redirect back with a success message
        return back()->with('message', 'Ministry profile updated successfully.');
    }

    public function updateMaritalProfile(Request $request){

        if ($request->marital_status == 'Married' ){
            $request->validate([
                'marital_status' => 'required|string',
                'anniversary' => 'required',
                'spouse_name' => 'required|string',
                'spouse_phone' => 'required|string',
                'spouse_email' => 'required|email',
                'spouse_occupation' => 'required|string',
                'spouse_office' => 'required|string',
                'children_number' => 'required|integer',
                'children_school' => 'required|string',
            ]);
        }



        $user = Session::get('staff');

        $exists = MaritalProfile::where('staff_id', $user->id)->first();

        if ($exists) {
            $staff = $exists;
        }
        else{
            $staff = new MaritalProfile();
        }
        $staff->staff_id = $user->id;
        $staff->marital_status = $request->marital_status;
        $staff->anniversary = $request->anniversary;
        $staff->spouse_name = $request->spouse_name;
        $staff->spouse_phone = $request->spouse_phone;
        $staff->spouse_email = $request->spouse_email;
        $staff->spouse_occupation = $request->spouse_occupation;
        $staff->spouse_office = $request->spouse_office;
        $staff->children_number = $request->children_number;
        $staff->children_school = $request->children_school;
        $staff->save();
        return back()->with('message', 'Marital Status updated successfully.');
    }

}
