<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Staff;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KcController extends Controller
{
    //

    public function successfulStaffLogin($token)
    {
        $user = User::where('kcAccessToken',$token)->firstOrFail();
        $user->kcAccessToken = null;
        $user->save();
        session()->put('user', $user);

        $intendedUrl = session('url.intended', route('home'));
        return redirect($intendedUrl);
    }
    public function successfulAdminLogin($token)
    {
        $admin = Admin::where('kc_token',$token)->firstOrFail();
        $admin->kc_token = null;
        $admin->save();
        session()->put('admin', $admin);

        session()->put('admin', $admin);
        return to_route('admin.index');
    }

    public function authorizeAdminLogin(Request $request)
    {

        $accessToken = $request->accessToken;
        $profile = $this->fetchKcProfile($accessToken)->profile;

        $username = $profile->user->username;
        $phone = $profile->phone_number;
        $phone = str_replace('+', '', $phone);

        $admin = Admin::where('username',$username)->first();
        if(!$admin){
            return redirect()->route('login')->with('message','Record Not Found');

        }

        $admin->kc_token = md5(time(). uniqid());
        $admin->image = $profile->user->avatar_url;
        $admin->phone =$phone;
        $admin->email =$profile->email->address;
        $admin->save();
        return redirect()->route('kcAdminAuth',$admin->kc_token);

    }
    public function authorizeLogin(Request $request)
    {

        $accessToken = $request->accessToken;
        $profile = $this->fetchKcProfile($accessToken)->profile;

        $username = $profile->user->username;
        $phone = $profile->phone_number;
        $phone = str_replace('+', '', $phone);

        $staff = Staff::where('username',$username)->first();
        if(!$staff){
            return redirect()->route('login')->with('message','Record Not Found');

        }

        $staff->kcAccessToken = md5(time(). uniqid());
        $staff->save();
        return redirect()->route('kcAuth',$staff->kcAccessToken);

    }

    private function fetchKcProfile($accessToken)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://connect.kingsch.at/api/profile',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $accessToken
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);

    }

}
