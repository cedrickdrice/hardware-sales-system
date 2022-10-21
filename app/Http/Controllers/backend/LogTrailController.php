<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\LogTrail;

class LogTrailController extends Controller
{
    public function getIndex()
    {
        $this->data['logs'] = LogTrail::orderBy('log_in', 'desc')->paginate(10);
        return view("back-end.log.index", $this->data);
    }
}
