<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GoalsController extends Controller
{
    public function fetchGoals($staff)
    {
        $goals = Goal::where('staff_id', $staff->id)->get();
        return $goals;
    }

    public function fetchReports($staff)
    {
        $reports = Report::where('staff_id', $staff->id)->get();
        return $reports;
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

        ]);

        $staff = Session::get('staff');

        $goal = new Goal();
        $goal->project_id = $request->project_id;
        $goal->subject = $request->subject;
        $goal->description = $request->description;
        $goal->start_date = $request->start_date;
        $goal->end_date = $request->end_date;
        $goal->staff_id = $staff->id;
        $goal->save();

        return to_route('goals')->with('message', 'Goal added successfully');
    }

    public function addReport(Request $request)
    {
        $request->validate([
            'report' => 'required',
            'goal_id' => 'required'
        ]);
        $staff = Session::get('staff');
        $goal = Goal::whereId($request->goal_id)->where('staff_id', $staff->id)->firstOrFail();

        $report = new Report();
        $report->report = $request->report;
        $report->project_id = $goal->project_id;
        $report->staff_id = $goal->staff_id;
        $report->goal_id = $goal->id;
        $report->save();

        return back()->with('message', 'Report added');
    }

    public function closeGoal($id)
    {
        $staff = Session::get('staff');
        $goal = Goal::whereId($id)->where('staff_id', $staff->id)->firstOrFail();
        $goal->status = 'done';
        $goal->save();

        return back()->with('message', 'Goal has been marked as done');
    }
}
