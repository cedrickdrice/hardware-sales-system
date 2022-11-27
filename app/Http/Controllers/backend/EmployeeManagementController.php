<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\AuditTrail;
use View,Crypt,Auth;

class EmployeeManagementController extends Controller
{
    public function getIndex()
    {
        $this->data['employees'] = User::where('type', 'icp')->paginate(10);
        return view('back-end.employees.index', $this->data);    
    }
    public function postInsert(Request $request)
    {
        $validate = $request->validate(User::validate_employee());
        User::manageEmployee($request);
        $user_id = Auth::user()->id;
        $comment = Auth::user()->type . ' hired a cashier';
        AuditTrail::insertComment($user_id, $comment);
        $this->data['employees'] = User::where('type', 'cashier')->paginate(10);
        $content = View::make('back-end.employees.includes.index-inner', $this->data)->render();
        return response()->json([
            'content'       => $content
        ]);
    }
    public function getDelete($id)
    {
        $data = User::find($id);
        $data->status = 2;
        $data->save();
        return redirect('manager/employees');
    }
    public function getEnable($id)
    {
        $data = User::find($id);
        $data->status = 1;
        $data->save();
        return redirect('manager/employees');
    }
}
