<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class icpDashboardController extends Controller
{
    public function getIndex()
    {
        return view("back-end.dashboard.icp.index");
    }
}
