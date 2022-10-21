<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth, Hash;

class UserAPIController extends Controller
{
    public function getInfo($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function postUpdate(Request $request)
    {
        $user = User::manageData($request, $request->id);
        return response()->json($user);
    }
    public function postLogin(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
            ])) 
        {
            if (Auth::user()->type =='icp' || Auth::user()->type =='cashier') {
                LogTrail::insertLog(Auth::user()->id);
            }
            return response()->json(Auth::user());
        } else {
            return response()->json([
                'result' => 'failed',
                'message' => 'Incorrect email/password'
            ]);
        }
    }
    public function postRegister(Request $request)
    {
        $user = User::manageData($request);
        return response()->json($user);
    }
    public function postVerify(Request $request)
    {
        $user = User::verify($request, $request->id);
        return response()->json($user);
    }
    public function postChangePassword(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
            ])) 
        {
            $user = User::changePassword($request, Auth::user()->id);
            return response()->json($user);
        } else {
            return response()->json('Incorrect password.');
        }
    }
    public function getResetPassword($email)
    {
        $user = User::sendResetPasswordLink($email);
        return response()->json('success');
    }
    public function getResendCode($user_id) 
    {
        User::sendVerificationCode($user_id);
        return response()->json('Code has been resend.');
    }
    public function getCreate()
    {
        $user = new User;
        $user->first_name = 'New';
        $user->last_name = 'Customer';
        $user->email = 'sample' . '_' . time() . '@sample.com';
        $user->password = Hash::make('sample');
        $user->status = 1;
        $user->type = 'user';

        /*
            random key
        */

        $length = 6;
        $key = '';
        $keys = array_merge(range(0, 9), range('A', 'Z'));
    
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        $user->random_code = $key;
        

        $user->save();
        
        return response()->json($user);
    }

    public function getLoginByCustomerCode($customer_code)
    {
        $user = User::where('random_code', $customer_code)->first();
        return response()->json($user);
    }
}
