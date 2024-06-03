<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\Director;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AppraisalController extends Controller
{
    public function submitAppraisal(Request $request)
    {
        $request->validate([
            'staff_id' => 'required',
            'period' => 'required',
            'score' => 'required',
            'from_director' => 'required'
        ]);

        $year = explode("-", $request->period)[0];
        $month = explode("-", $request->period)[1];

        if($request->from_director == 'yes'){
            $staff = Staff::whereId($request->staff_id)->where('is_leader', 'yes')->firstOrFail();
            $submitted = Appraisal::where('staff_id', $staff->id)->whereYearAndMonth($year, $month)->exists();
            $leader = Director::first();
        } else {
            $leader = Session::get('staff');
            $staff = Staff::whereId($request->staff_id)->where('department_id', $leader->department_id)->firstOrFail();
            $submitted = Appraisal::where('staff_id', $staff->id)->whereYearAndMonth($year, $month)
                ->where('appraised_by', $leader->id)->exists();
        }

        if($submitted){
            return back()->with('error', 'Appraisal has been submitted already');
        }

        $arr = [];
        $scores = $request->score;
        foreach($scores as $score){
            $score = ($score > 10) ? 10 : $score;
            array_push($arr, $score);
        }

        $app = new Appraisal();
        $app->staff_id = $staff->id;
        $app->appraised_by = $leader->id;
        $app->year = $year;
        $app->month = $month;
        $app->from_director = $request->from_director;
        $app->scores = implode(",", $arr);
        $app->comment = $request->comment;
        $app->save();

        return back()->with('message', 'Appraisal submitted');
    }

    public function viewAppraisal($id)
    {
        $staff = Session::get('staff');
        if($staff->is_leader == 'yes'){
            $app = Appraisal::findOrFail($id);
            if($app->staff_id != $staff->id && $app->department_id != $staff->department_id){
                abort(404);
                return false;
            }
        } else {
            $app = Appraisal::where('staff_id', $staff->id)->whereId($id)->firstOrFail();
        }

        return $app;
    }

    public function directorViewAppraisal($id)
    {
        return Appraisal::find($id);
    }

    public function template()
    {
        $content = [
            [
                'attribute' => 'Ability to see/initiative',
                'description' => 'Sees ahead and wider than others. Takes action in problem situations as required; addresses pressing issues even if he/she does not have direct responsibility.'
            ],
            [
                'attribute' => 'Availability',
                'description' => 'Available in the mind and physically. Focused, ready and willing to selflessly serve on the job and beyond the assigned work at convenient and not convenient times.'
            ],
            [
                'attribute' => 'Diligence',
                'description' => 'Gives painstaking attention to details of activities, displays carefulness.'
            ],
            [
                'attribute' => 'Quality Control',
                'description' => 'Carries out activities for the best and most adequate qualities of output.'
            ],
            [
                'attribute' => 'Timeliness',
                'description' => 'Do things at the correct, most useful and appropriate time. Plans and takes action immediately, avoiding rush and the display of disorder, giving room to review and perfect.'
            ],
            [
                'attribute' => 'Responsiveness and follow through',
                'description' => 'Reacts quickly, adequately and positively. Has the consciousness of urgency.  Follows through and delivers on expectations without procrastination and delay.'
            ],
            [
                'attribute' => 'Resourcefulness',
                'description' => 'Creates and manages assets. Identifies materials, opportunities, talents and effectively manages them to save costs and/or produce income or future benefit.'
            ],
            [
                'attribute' => 'Team Playing',
                'description' => 'Contributes and works effectively with team members; values and takes account of their contributions. Makes up for the lack of others, seeks to improve others on the team.'
            ],
            [
                'attribute' => 'Assessment, reporting feedback',
                'description' => 'Measures the progress and status of work with the use of relevant tools. Gives quality and consistent information on assigned tasks.'
            ],
            [
                'attribute' => 'Oral Communication',
                'description' => 'Spoken communication is gracious, pleasant, seasoned and answers all (senior and junior) in love and with respect.'
            ],
            [
                'attribute' => 'Written Communication',
                'description' => 'Sentences are without errors, easy to understand and properly constructed and arranged.'
            ],
            [
                'attribute' => 'Work Under Pressure',
                'description' => 'Performance is not adversely affected by increase in pressure of work.'
            ],
            [
                'attribute' => 'Knowledge',
                'description' => 'Expands understanding and knowledge of work, and tools. Studies and improves knowledge, increasing in diversity and vastness.'
            ],
            [
                'attribute' => 'Creativity and Innovation',
                'description' => 'Develops and implements new ideas or ways of doing things that enhance the achievement of work objectives. Makes work Richer, Easier and Faster.'
            ],
            [
                'attribute' => 'Use of Instruments',
                'description' => 'Uses appropriate instruments to produce accuracy, precision and speed.'
            ],
            [
                'attribute' => 'Organization/Coordination',
                'description' => 'Organizes work effectively to persistently produce desired output.'
            ],
            [
                'attribute' => 'Planning, analysis and proactiveness',
                'description' => 'Sets objectives, goals and determines the things that can be done for the achievement or attainment of them. Assesses work issues and provides basic interpretations and solutions. Envisages and prepares for likely future problems.'
            ],
            [
                'attribute' => 'People Management',
                'description' => 'Gives adequate guidance and direction, trains, develops and mentors. Delegates work adequately and efficiently, taking into cognizance the various abilities and skill levels. Motivates people, thoughtful in dealings, using the right approach or methods to relate and work with them.'
            ],
            [
                'attribute' => 'Documentation of Standards of Operation',
                'description' => 'Develops and documents standards of operations for further development, accurate repetitions of procedures and posterity.'
            ],
            [
                'attribute' => 'Independent Work',
                'description' => 'Performs productively under all circumstances and is self sufficient, self determining; possessing the necessary skills in order not to require excessive supervision, intervention, aid and support of supervisors and/or management.'
            ]
        ];

        return $content;
    }
}
