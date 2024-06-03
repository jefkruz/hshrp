<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Director;
use App\Models\Goal;
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
            'portal_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'department_id' => 'required',
        ]);

        $staffExists = Staff::where('portal_id', $request->portal_id)->exists();
        if($staffExists){
            return back()->with('error', 'Portal ID exists');
        }

        $staff = new Staff();
        $staff->firstname = $request->firstname;
        $staff->lastname = $request->lastname;
        $staff->portal_id = $request->portal_id;
        $staff->department_id = $request->department_id;
        $staff->save();

        return back()->with('message', 'Staff has been added');
    }
}
