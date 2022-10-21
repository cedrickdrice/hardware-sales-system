<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Order;
use App\User;
use Carbon\Carbon;
use Crypt;

class AdminDashboardController extends Controller
{
    public function getIndex()
    {
        $this->data['total_products'] = count(Product::all());
        $this->data['total_employee'] = User::where('type', '!=', 'user')->count();
        $this->data['total_customer'] = User::where('type', 'user')->count();
        $this->data['total_process'] = Order::where('status', 0)->orWhere('status', 1)->count();
        $this->data['total_shipped'] = Order::where('status', '!=', 1)->count();    
        $this->data['total_cod'] = Order::where('type', 0)->count();
        $this->data['total_paid'] = Order::where('type', '!=', 0)->count();

        $this->data['total_sales'] = 0;
        $orders_total = Order::all();
        
        foreach ($orders_total as $order) {
            // $this->data['total_sales'] += Crypt::decrypt($order->amount);
            // $this->data['total_sales'] .= " " .Crypt::decrypt($order->amount);
        }
        // dd($this->data['total_sales']);
        
        $this->data['today_sales'] = 0;
        $orders_today = Order::whereDate('created_at', Carbon::today())->get();
        foreach ($orders_today as $order) {
            $this->data['today_sales'] += Crypt::decrypt($order->amount);
        }

        return view('back-end.dashboard.index', $this->data);
    }
}