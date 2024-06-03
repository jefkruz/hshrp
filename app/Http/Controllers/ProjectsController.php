<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjectsController extends Controller
{
    public function fetchProjects($staff)
    {
        if($staff->is_leader == 'yes'){
            $projects = Project::where('department_id', $staff->department_id)->get();
        } else {
            $projects = Project::where('project_teams.staff_id', $staff->id)
                ->join('project_teams', 'project_teams.project_id', '=', 'projects.id')
                ->select('projects.*', 'project_teams.staff_id', 'project_teams.project_id')->get();
        }

        return $projects;
    }

    public function store(Request $request)
    {
        $request->validate([
            'team' => 'required',
            'title' => 'required',
            'leader_id' => 'required',
            'description' => 'required'
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->leader_id = $request->leader_id;
        $project->team_ids = $request->team;
        $project->department_id = Session::get('staff')->department_id;
        $project->save();

        $members = explode(",", $request->team);
        foreach($members as $member){
            $t = new ProjectTeam();
            $t->project_id = $project->id;
            $t->staff_id = $member;
            $t->save();
        }
        return to_route('projects')->with('message', 'Project created');
    }
}
