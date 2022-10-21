<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\QR;
use App\User;
use QRCode;

class QrCodeController extends Controller
{
    public function getNew()
    {
        $qr = QR::createNew();
        return response()->json($qr);
    }
    public function getQrImage()
    {
        $qr = QR::orderBy('id', 'DESC')->first();
        // $url = 'http://192.168.0.108/sam/public/api/log/in/' . $qr->code;
        $url = 'http://sam-department.com/samapparel/public/api/log/in/' . $qr->code;
        return QRCode::text($url)->png();
    }
    public function getUserQrImage($id)
    {
        $user = User::find($id);
        // $url = 'http://192.168.0.108/sam/public/api/user/login/' . $user->random_code;
        $url = 'http://sam-department.com/samapparel/public/api/user/login/' . $user->random_code;
        return QRCode::text($url)->png();
    }
}

