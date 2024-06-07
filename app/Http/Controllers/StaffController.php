<?php

namespace App\Http\Controllers;

use App\Models\AcademicProfile;
use App\Models\BankProfile;
use App\Models\Department;
use App\Models\Director;
use App\Models\Goal;
use App\Models\MaritalProfile;
use App\Models\MinistryProfile;
use App\Models\ParentalProfile;
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

    public function updateBankProfile(Request $request)
    {
        $request->validate([
            'bank_name' =>'required|string',
            'account_name' =>'required|string',
            'account_number' =>'required|string',
            'espees_username' =>'required|string',
            'espees_wallet' =>'required|string',
        ]);

        $user = Session::get('staff');

        $exists = BankProfile::where('staff_id', $user->id)->first();

        if ($exists) {
            $staff = $exists;
        }
        else{
            $staff = new BankProfile();
        }
        $staff->staff_id = $user->id;
        $staff->bank_name = $request->bank_name;
        $staff->account_name = $request->account_name;
        $staff->account_number = $request->account_number;
        $staff->espees_username = $request->espees_username;
        $staff->espees_wallet = $request->espees_wallet;
        $staff->save();
        return back()->with('message', 'Bank Profile updated successfully.');

    }

    public function updateParentalProfile(Request $request)
    {
        $request->validate([
            'parents_alive'=> 'required|string',
            'parents_born_again'=> 'required|string',
            'siblings_number'=> 'required|string',
            'family_position'=> 'required|string',

        ]);
        $user = Session::get('staff');

        $exists = ParentalProfile::where('staff_id', $user->id)->first();

        if ($exists) {
            $staff = $exists;
        }
        else{
            $staff = new ParentalProfile();
        }
        $staff->staff_id = $user->id;
        $staff->parents_alive = $request->parents_alive;
        $staff->parents_born_again = $request->parents_born_again;
        $staff->ministry_members = $request->ministry_members;
        $staff->parents_denomination = $request->parents_denomination;
        $staff->parents_zone = $request->parents_zone;
        $staff->parents_church = $request->parents_church;
        $staff->parents_pastor = $request->parents_pastor;
        $staff->siblings_number = $request->siblings_number;
        $staff->family_position = $request->family_position;
        $staff->save();
        return back()->with('message', 'Parental Profile updated successfully.');

    }

    public function updateNokProfile(Request $request)
    {
        $request->validate([

            'nok1_name' =>'required|string',
            'nok1_phone' =>'required|string',
            'nok1_relationship' =>'required|string',
            'nok2_name' =>'required|string',
            'nok2_phone' =>'required|string',
            'nok2_relationship' =>'required|string',
        ]);

        $user = Session::get('staff');

        $staff = Staff::where('id', $user->id)->first();
        $staff->nok1_name = $request->nok1_name;
        $staff->nok1_relationship = $request->nok1_relationship;
        $staff->nok1_phone = $request->nok1_phone;
        $staff->nok2_name = $request->nok2_name;
        $staff->nok2_relationship = $request->nok2_relationship;
        $staff->nok2_phone = $request->nok2_phone;
        $staff->save();
        Session::put('staff', $staff);
        return back()->with('message', 'Next of Kin updated successfully.');


    }

    public function updateMedicalProfile(Request $request)
    {
        $request->validate([
            'genotype' =>'required|string',
            'blood_group' =>'required|string',
            'allergies' =>'required|string',
            'health_condition' =>'required|string',
            'health_insurance' =>'required|string',
        ]);

        $user = Session::get('staff');

        $staff = Staff::where('id', $user->id)->first();
        $staff->genotype = $request->genotype;
        $staff->blood_group = $request->blood_group;
        $staff->allergies = $request->allergies;
        $staff->health_condition = $request->health_condition;
        $staff->health_insurance = $request->health_insurance;
        $staff->save();
        Session::put('staff', $staff);
        return back()->with('message', 'Medical Profile updated successfully.');
    }

    public function updateEducationProfile(Request $request)
    {

        // Validate the request
        $request->validate([
            'institution.*' => 'required|string|max:255',
            'subject.*' => 'required|string|max:255',
            'start_date.*' => 'required|date',
            'complete_date.*' => 'required|date',
            'degree.*' => 'required|string|max:255',
            'grade.*' => 'nullable|string|max:255',
        ]);


        // Assuming you have a user or staff model where you save this data
        $user = Session::get('staff');
        // Find the staff member
        $staff = Staff::findOrFail($user->id);

        // Clear the existing academic profiles
        $staff->academicProfiles()->delete();

        // Save each education detail
        foreach ($request->institution as $key => $value) {
            AcademicProfile::create([
                'staff_id' => $staff->id,
                'institution' => $value,
                'subject' => $request->subject[$key],
                'start_date' => $request->start_date[$key],
                'complete_date' => $request->complete_date[$key],
                'degree' => $request->degree[$key],
                'grade' => $request->grade[$key] ?? null,  // Handle optional grade
            ]);
        }

        return redirect()->back()->with('message', 'Education profile updated successfully!');
    }

}
