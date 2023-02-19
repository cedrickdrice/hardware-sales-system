<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Product;
use PDF; 

class ReportManagementController extends Controller
{
    public function getIndex()
    {
        $this->data['sales'] = Order::orderBy('created_at', 'desc')->paginate(8);
        $this->data['products'] = Product::orderBy('name', 'asc')->paginate(8);
        $this->data['forecast'] = $this->generateSalesGraph();
        $this->data['label'] = 'no';
        return view('back-end.reports.index', $this->data);
    }
    public function postSearch(Request $request)
    {
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;
        $this->data['sales'] = Order::whereBetween('created_at', [$dateFrom, $dateTo])->paginate(8);
        $this->data['products'] = Product::orderBy('created_at', 'desc')->paginate(8);
        $this->data['label'] = 'yes';
        // dd($this->data['products']);
        return view('back-end.reports.index', $this->data);
    }
    public function getPDF_Inventory()
    {
        $this->data['products'] = Product::orderBy('name', 'asc')->get();
        $this->data['title'] = "Inventory Report";

        $pdf = PDF::loadView('back-end.pdf.product', $this->data); 
        return $pdf->stream('products.pdf');
    }
    public function getPDF_Sales()
    {
        $this->data['sales'] = Order::orderBy('created_at', 'desc')->get();
        $this->data['title'] = "Sales Report";

        $pdf = PDF::loadView('back-end.pdf.sales', $this->data); 
        return $pdf->stream('sales.pdf');
    }
}
