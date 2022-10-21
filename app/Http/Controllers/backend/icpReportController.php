<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use PDF;
class icpReportController extends Controller
{
    public function getIndex()
    {
        $this->data['products'] = Product::orderBy('name', 'asc')->paginate(8);
        return view("back-end.reports.icp.index",$this->data);
    }
    public function getPDF_Inventory()
    {
        $this->data['products'] = Product::orderBy('name', 'asc')->get();
        $this->data['title'] = "Inventory Report";

        $pdf = PDF::loadView('back-end.pdf.product', $this->data); 
        return $pdf->stream('products.pdf');
    }
}
