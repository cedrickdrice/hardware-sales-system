<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\AuditTrail;
use Auth, View, Crypt, PDF;

class UserManagementController extends Controller
{
    public function getIndex()
    {
        $this->data['users'] = User::where('type','user')->orderBy('created_at', 'desc')->paginate(8);
        return view('back-end.customers.index', $this->data);
    }
    public function getDownload()
    {
        $this->data['users'] = User::where('type','user')->orderBy('created_at', 'desc')->get();
        $this->data['title'] = "Users Report";
        $user_id = Auth::user()->id;
        $comment =  Auth::user()->full_name() . " has been printed a list of customer";
        AuditTrail::insertComment($user_id, $comment);
        $pdf = PDF::loadView('back-end.pdf.user', $this->data); 
        return $pdf->stream('users.pdf');
    }
}
