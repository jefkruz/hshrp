<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\AppraisalAttribute;
use App\Models\Country;
use App\Models\Department;
use App\Models\Director;
use App\Models\Goal;
use App\Models\MinistryProfile;
use App\Models\Project;
use App\Models\Report;
use App\Models\Staff;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PlatformController extends Controller
{
    public function dashboard()
    {
        $m = new MenuController();
        $d = new DashboardController();
        $p = new ProjectsController();
        $staff = Session::get('staff');
        $data['page_title'] = 'Dashboard';
        $data['projects'] = $p->fetchProjects($staff);
        $data['greeting'] = $d->greeting();
        $data['menu'] = $m->fetchMenu();
        $data['statistics_card'] = $d->statisticsCard();
        return view('dashboard', $data);
    }

    public function projects()
    {
        $m = new MenuController();
        $p = new ProjectsController();
        $staff = Session::get('staff');
        $data['page_title'] = 'Your Projects';
        $data['menu'] = $m->fetchMenu();
        $data['projects'] = $p->fetchProjects($staff);
        $data['staff'] = $staff;
        return view('projects', $data);
    }

    public function showCreateProjectForm()
    {
        $user = Session::get('staff');
        if($user->is_leader != 'yes'){
            return back();
        }
        $m = new MenuController();
        $data['page_title'] = 'Create Project';
        $data['menu'] = $m->fetchMenu();
        $data['staff'] = Staff::where('department_id', $user->department_id)->where('id', '!=', $user->id)->get();
        return view('create_project', $data);
    }

    public function goals()
    {
        $m = new MenuController();
        $g = new GoalsController();
        $staff = Session::get('staff');
        $data['page_title'] = 'Your Goals';
        $data['menu'] = $m->fetchMenu();
        $data['goals'] = $g->fetchGoals($staff);
        return view('goals', $data);
    }

    public function viewGoal($id)
    {
        $m = new MenuController();
        $staff = Session::get('staff');
        $goal = Goal::where('staff_id', $staff->id)->whereId($id)->firstOrFail();
        $data['reports'] = Report::where('goal_id', $goal->id)->get();
        $data['page_title'] = 'View Goal';
        $data['menu'] = $m->fetchMenu();
        $data['goal'] = $goal;
        return view('view_goal', $data);
    }

    public function showCreateGoalsForm()
    {
        $m = new MenuController();
        $p = new ProjectsController();
        $data['page_title'] = 'Create Goals';
        $data['menu'] = $m->fetchMenu();
        $data['projects'] = $p->fetchProjects(Session::get('staff'));
        return view('create_goals', $data);
    }

    public function leaderTeam()
    {
        $m = new MenuController();
        $s = new StaffController();
        $staff = Session::get('staff');
        $data['page_title'] = 'My Team';
        $data['menu'] = $m->fetchMenu();
        $data['team'] = $s->fetchTeam($staff);
        return view('team', $data);
    }

    public function viewTeamMember($id)
    {
        $m = new MenuController();
        $s = new StaffController();
        $staff = Session::get('staff');
        if($staff->is_leader != 'yes'){
            return back();
        }
        $member_data = $s->fetchTeamMember($id);
        $data['page_title'] = 'View Member';
        $data['menu'] = $m->fetchMenu();
        $data['member_data'] = $member_data;
        $data['canAppraise'] = ($staff->id != $id);
        $data['appraisals'] = Appraisal::where('staff_id', $id)->get();
        $data['appraisal_attributes'] = AppraisalAttribute::all();
        return view('view_member', $data);
    }

    public function appraisals()
    {
        $m = new MenuController();
        $staff = Session::get('staff');
        $data['page_title'] = 'Appraisals';
        $data['menu'] = $m->fetchMenu();
        $data['appraisals'] = Appraisal::where('staff_id', $staff->id)->get();
        return view('appraisals', $data);
    }

    public function viewAppraisal($id)
    {
        $m = new MenuController();
        $a = new AppraisalController();
        $appraisal = $a->viewAppraisal($id);
        $attributes = AppraisalAttribute::all();
        $score = 0;
        $scores = explode(",",$appraisal->scores);
        foreach($scores as $sc){
            $score += $sc;
        }
        $total = ($score / count($attributes)) * 10;
        $data['page_title'] = 'View Appraisal';
        $data['menu'] = $m->fetchMenu();
        $data['appraisal'] = $appraisal;
        $data['total'] = $total;
        $data['appraisal_attributes'] = $attributes;
        return view('view_appraisal', $data);
    }

    public function profile()
    {
        $staff = Session::get('staff');

        $m = new MenuController();

        $department = Department::find($staff->department_id);
        if($staff->is_leader == 'yes'){
            $data['superior']  = Director::first();
        } else {
            $data['superior']  = Staff::find($department->leader_id);
        }
        $data['page_title'] = 'Profile';
        $data['countries'] = Country::all();
        $data['zones'] = Zone::all();
        $data['is_leader'] = $staff->is_leader;
        $data['department'] = $department;
        $data['staff'] = $staff;
        $data['menu'] = $m->fetchMenu();
        return view('profile', $data);
    }


}
