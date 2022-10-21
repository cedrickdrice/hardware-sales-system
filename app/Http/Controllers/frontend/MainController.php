<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Product;
use App\Model\Order_Detail;


class MainController extends Controller
{
    public function getIndex()
    {
        $this->data['newest_products'] = Product::select('*')->orderBy('created_at', 'desc')->take(2)->get();
        $this->data['random_products'] = Product::where('stock', '!=', 0)->inRandomOrder()->take(8)->get();
        $this->data['popular_products'] = Order_Detail::selectRaw('product_id,count(product_id) as products')->groupBy('product_id')->orderBy('products','desc')->limit(5)->get(5);
        // $this->data['popular_products'] = Order_Detail::all()->get(5);
        // dd($this->data['popular_products']);
        return view('front-end.includes.home',$this->data);
    }
}
