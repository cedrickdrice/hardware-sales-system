<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\User_Address;
use App\Model\Order;
use App\Model\Gallery;
use Auth,Redirect,View, Crypt, Session;

class AccountController extends Controller
{
    public function getIndex() 
    {
        $this->data['account'] = User::find(Auth::user()->id);
        $this->data['orders'] = Order::where('user_id', Auth::user()->id)->where('status', '!=', '3')->orderBy('created_at', 'desc')->get();
        return view('front-end.account.index', $this->data);
    }
    public function postUpdate(Request $request)
    {
        $validated = $request->validate(User::validate_update($request));
        $id = Auth::user()->id;
        $success = User::manageData($request,$id);
        if ( $success ) {
            $this->data['account'] = User::find(Auth::user()->id);
            $content = View::make('front-end.account.includes.index-info', $this->data)->render();
            return response()->json([
                'content'   => $content,
                'label'     => 'Account Information changed successfully'
            ]);
        }
    }
    public function getAddress($id)
    {
        $this->data['address'] = User_Address::find($id);
        return response()->json([
            'address'       => $this->data['address']
        ]);
    }
    public function postInsert(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if ($user->address === null) 
            User::addAddress($request, $id);
        else 
            User_Address::manageData($request);
        $this->data['addresses'] = User_Address::where('user_id', Auth::user()->id)->get();
        $content = View::make('front-end.account.includes.index-inner', $this->data)->render();
        return response()->json([
            'content'       => $content
        ]);
    }
    public function getVerify()
    {
        return view('front-end.account.verify');
    }
    public function postVerify(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::verify($request, $id);
        if ($user->status === 1) {
            return redirect('/account');
        } else {
            Session::flash('failed', 'Account not verified. Incorect verification code.');
            return redirect('/verify');
        }
    }
    public function getSendVerification()
    {
        $id = Auth::user()->id;
        User::sendVerificationCode($id);
        Session::flash('success', 'New verification code sent.');
        return redirect('/verify');
    }
    public function postAccountUpdate(Request $request)
    {
        $validated = $request->validate(User::validate_code());
        if ( $validated ) {
            User::updateAccount($request);
            return redirect('account');
        }
    }
}
