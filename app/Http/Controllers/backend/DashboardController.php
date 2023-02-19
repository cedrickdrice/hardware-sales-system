<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Order;
use App\Model\Order_Detail;
use App\User;
use Carbon\Carbon;
use View, Crypt, Auth;

class DashboardController extends Controller
{
    public function getIndex()
    {
        $this->data['best_seller'] = Order_Detail::selectRaw('product_id,count(product_id) as best_seller')->groupBy('product_id')->orderBy('best_seller', 'desc')->first();
        $this->data['best_sellers'] = Order_Detail::selectRaw('product_id,count(product_id) as best_seller')->groupBy('product_id')->orderBy('best_seller', 'desc')->get(10);
        $this->data['critical_product'] = Product::selectRaw('*,(stock/(stock + used_stock)) as critical_level')->orderBy('critical_level', 'asc')->first();
        $this->data['recently_addeds'] = Product::orderBy('created_at','desc')->limit(4)->get();
        $this->data['latest_orders'] = Order::orderBy('created_at', 'desc')->limit(6)->get();
        $this->data['total_products'] = count(Product::all());
        $this->data['total_customer'] = User::where('type', 'user')->count();
        $this->data['total_order'] = count(Order::all());
        $this->data['delivery_charge'] =
        $this->data['today_sales'] = 0;
        $orders_today = Order::whereDate('created_at', Carbon::today()->format('Y-m-d'))->get();
        foreach ($orders_today as $today) {
            $this->data['today_sales'] += Crypt::decrypt($today->amount);
        }
        $sales = 0;
        $orders_total = Order::all();
        foreach ($orders_total as $order) {
            $sales += $order->totalAmount();
        }
        $inventory = 0;
        $product_total = Product::all();
        foreach($product_total as $product) {
            $stock = $product->stock;
            $used = $product->used_stock;
            $total_stock = $used + $stock;
            $price = $product->delivery_price;
            $inventory += $total_stock * $price;
        }

        $this->data['monthly_sales'] = Order::where('status', '=', '2')->get()->groupBy(function($d) {
            return Carbon::parse($d->created_at)->format('M');
        });
        $this->data['monthly_products'] = $monthly_products = Product::get()->groupBy(function($d) {
            return Carbon::parse($d->updated_at)->format('M');
        });

        $forecast = $this->generateSalesGraph();
        $this->data['monthly_forecast'] = $forecast;
        $this->data['total_sales'] = collect($forecast)->sum('actual_sales');

        return view('back-end.dashboard.manager.index', $this->data);
    }
}
