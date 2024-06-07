<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Director;
use App\Models\Feedback;
use App\Models\Staff;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        if(session('staff')){
            return redirect()->route('dashboard');
        }
        return view('authentication.login');
    }

    public function showAdminLogin($person)
    {
        $roles = [
            'admin' => [
                'message' => 'Welcome Admin',
                'route' => 'adminLogin'
            ],
            'director' => [
                'message' => 'Welcome Director',
                'route' => 'directorLogin'
            ]
        ];

        if(!array_key_exists($person, $roles)){
            return to_route('login');
        }
        $data['person'] = $roles[$person];
        return view('authentication.admin_login', $data);
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::whereUsername($request->username)->first();
        if(!$admin){
            return back()->with('error', 'User not found');
        }

        $validated = password_verify($request->password, $admin->password);
        if(!$validated){
            return back()->with('error', 'Incorrect credentials');
        }

        session()->put('admin', $admin);
        return to_route('admin.index');

    }

    public function directorLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $director = Director::whereUsername($request->username)->first();
        if(!$director){
            return back()->with('error', 'User not found');
        }

        $validated = password_verify($request->password, $director->password);
        if(!$validated){
            return back()->with('error', 'Incorrect credentials');
        }

        session()->put('director', $director);
        return to_route('director.index');

    }

    public function staffLogin(Request $request)
    {
        $request->validate([
            'portal_id' => 'required',
            'password' => 'required'
        ]);

        $member = Staff::where('portal_id', $request->portal_id)->first();
        if(!$member){
            return back()->with('error', 'Please contact site admin');
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://mobileapizx.blwstaffportal.org/apiauth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'portalID=' . $request->portal_id . '&password=' . $request->password . '&apiKey=12RT5HWI9Y00FFG3',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $resp = json_decode($response);

        if($resp->status == false){
            return back()->with('error', $resp->message);
        }

        $payload = $resp->user;

        $member->title = $payload->title;
        $member->firstname = $payload->firstName;
        $member->lastname = $payload->lastName;
        $member->email = $payload->emailAddress;
        $member->profile_pic = $payload->picturePath;
        $member->gender = $payload->gender;
        $member->nationality = $payload->nationality;
        $member->designation = $payload->designation;
        $member->marital_status = $payload->maritalStatus;
        $member->save();

        session()->put('staff', $member);
        return redirect()->route('dashboard');

    }

    public function showFeedback()
    {

        return view('feedback');
    }

    public function submitFeedback(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'department' =>'required',
            'username' =>'required',
            'changes' =>'required',
            'message' =>'required',
            'result' =>'required'
        ]);
        $existing = Feedback::where('username', $request->username)->first();
        if ($existing) {
            return back()->with('error', 'You have already submitted feedback');
        }
        $feedback = new Feedback();
        $feedback->name = $request->name;
        $feedback->username = $request->username;
        $feedback->department = $request->department;
        $feedback->changes = $request->changes;
        $feedback->message = $request->message;
        $feedback->result = $request->result;
        $feedback->save();
        return back()->with('message', 'Thank you for your feedback');
    }

    public function logout()
    {
        session()->flush();
        return to_route('login');
    }
}
