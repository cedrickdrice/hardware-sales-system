<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\Verification;
use App\Model\Configuration;
use App\User;
use App\Model\LogTrail;
use Hash;
use Auth;
use Redirect;
use Session;
use Crypt;
use Validator;

class MainController extends Controller
{
    public function getLogin()
    {
        $this->data['label'] = "no";
        $this->data['status'] = "no";
        return view('login', $this->data);
    }
    public function postCode(Request $request)
    {
        if (Auth::attempt(['random_code' => $request->code, 'status' => '1', 'last_name' => 'Customer', 'password' => 'sample'])) {
            return redirect('/loginCode');
        } else {
            return Redirect::back()->withErrors(['error'=>'Incorrect email/password, please re-enter your credentials']);
        }
    }
    public function postLogin(Request $request)
    {
        $user = $request->email;
        
        if (filter_var($user, FILTER_VALIDATE_EMAIL)) {
            $condition = Auth::attempt(['email' => $user, 'password' => $request->password]);
        } else {
            $condition = Auth::attempt(['username' => $user, 'password' => $request->password]);
        }
        if ( $condition ) {
            if (Auth::user()->type == 'admin' ) {
                $user_id = Auth::user()->id;
                LogTrail::insertLog($user_id);
                return redirect('admin/dashboard');
            } elseif (Auth::user()->type == 'user' && Auth::user()->status == '1') {
                return redirect('/account');
            } elseif (Auth::user()->type == 'icp' && Auth::user()->status == '1') {
                $user_id = Auth::user()->id;
                LogTrail::insertLog($user_id);
                return redirect('icp/products');
            } elseif (Auth::user()->type == 'manager' && Auth::user()->status == '1') {
                $user_id = Auth::user()->id;
                LogTrail::insertLog($user_id);
                return redirect('manager/dashboard');
            } else {
                Auth::logout();
                $this->data['label'] = "status";
                $this->data['status'] = 'no';
                return view('login', $this->data);
            }
        } else {
            return Redirect::back()->withErrors(['error'=>'Incorrect email/password, please re-enter your credentials']);
        } 
    }
    public function getLogout()
    {
        if ( Auth::user()->type == 'admin' || Auth::user()->type == 'icp' || Auth::user()->type == 'manager') {
            $user_id = Auth::user()->id;
            $log = LogTrail::where('log_out', null)->where('user_id',$user_id)->orderBy('id','desc')->first();
            $id = $log->id;
            LogTrail::logOut($id);
        }
        Auth::logout();
        return redirect('/login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function postRegister(Request $request)
    {
        $validated = Validator::make($request->all(), User::validate());
        if ($validated->fails() == false) {
            $success = User::manageData($request);
            if ($success !== null) {
                $this->data['label'] = "yes";
                $this->data['status'] = 'no';
                return view('login', $this->data);
            }
        }
        return redirect('/login#register')
            ->withErrors($validated)
            ->withInput($request->all());
    }
    public function postVerify(Request $request)
    {
        $user = User::orderBy('id','desc')->first();
        $user_id = $user->id;
        User::verify($request,$user_id);
        
        return redirect('/login')->withSuccess(['success' => 'Success! Please re-enter your credential']);
    }
    public function postForgotVerify(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $user_id = $user->id;
        User::verify($request,$user_id);
        return view('/login', [
            'status' => 'Success! Please re-enter your credential',
            'label' => 'no'
        
        ]);
    }
    public function getResendCode($email)
    {
        $user = User::where('email', $email)->first();
        if ($user->status === 1) {
            return response()->json([
                'error' => 'Your account is already verified'
            ]);
        }
        $user_id = $user->id;
        User::sendVerificationCode($user_id);
        return response()->json([
            'success' => 'success'
        ]);
    }
    public function postForgotPassword(Request $request)
    {
        $user = User::sendResetPasswordLink($request->email);
        if ($user !== null) {
            return response()->json('success');
        } else {
            return response()->json('error');
        }
    }
    public function getResetPassword($encrypted_id)
    {
        $this->data['id'] = $encrypted_id;
        return view('reset-password', $this->data);
    }
    public function postResetPassword(Request $request)
    {
        if ( $request->password == "" || $request->confirm_password == "" ) {
            return Redirect::back()->withErrors(['error'=>'Please fill-up all fields.']);
        } 
        elseif ($request->password !== $request->confirm_password) {
            return Redirect::back()->withErrors(['error'=>'Password and Confirm password do not match.']);
        }
        else {
            $validated = $request->validate(User::reset_password_rule());
            $user = User::resetPassword($request);
    
            Auth::login($user);
            return redirect('/');
        }
    }
}
