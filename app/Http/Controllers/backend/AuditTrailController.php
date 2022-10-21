<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AuditTrail;

class AuditTrailController extends Controller
{
    public function getIndex()
    {
        $this->data['audits'] = AuditTrail::orderBy('created_at', 'desc')->paginate(10);
        return view("back-end.audit.index", $this->data);
    }
}
