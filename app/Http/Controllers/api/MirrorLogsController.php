<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\MirrorLog;
use App\Model\QR;

class MirrorLogsController extends Controller
{
    public function login($id)
    {
        $user = MirrorLog::login($id);
        return response()->json($user);
    }
    public function loginByCode($code, $id)
    {
        $valid_code = QR::checkValidity($code);
        if ($valid_code) {
            $user = MirrorLog::login($id);
            return response()->json($user);
        }
        return response()->json(['result' => 'Invalid code.']);
    }
    public function logout($id)
    {
        $user = MirrorLog::logout($id);
        //return response()->json($user);
    }
    public function getLoggedInUser()
    {
        $lastLoggedIn = MirrorLog::getLoggedInUser();
        if ($lastLoggedIn != null) {
            $user = $lastLoggedIn->user;
            return response()->json($user);
        }
    }
}
