<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Category;
use App\Model\Product_Review;
use App\Model\Product_Filter;
use App\Model\Wishlist;
use View,Crypt,Auth;

class ShopController extends Controller
{
    public function getIndex()
    {
        $this->data['products'] = Product::where('stock', '!=', '0')->orderBy('created_at', 'desc')->paginate(9);
        $this->data['newest_products'] = Product::select('*')->orderBy('created_at', 'desc')->take(2)->get();
        $this->data['category_products'] = Category::where('type','product')->get();
        $this->data['category_colors'] = Category::where('type','color')->get();
        $this->data['category_genders'] = Category::where('type','gender')->get();
        $this->data['max_value'] = Product::orderBy('price', 'desc')->first();
        return view('front-end.shop.index', $this->data);
    }
    public function getFilter($id)
    {
        $this->data['products'] = Product::where('stock', '!=', '0')->where('category_id',$id)->orderBy('created_at', 'desc')->paginate(9);
        $content = View::make('front-end.shop.includes.index-inner', $this->data)->render();
        return response()->json([
            'content'   => $content
        ]);
    }
    public function getFilterColor($id)
    {
        // $this->data['products'] = Product::whereHas('product_filters', function($q) use($id){
        //                                         $q->where('category_id',$id);
        //                                     })->get();
        $this->data['products'] = Product_Filter::where('category_id', $id)->paginate(9);
        $content = View::make('front-end.shop.includes.index-color', $this->data)->render();
        return response()->json([
            'content'   => $content
        ]);
    }
    public function getFilterGender($id)
    {
        $this->data['products'] = Product::where('stock', '!=', '0')->where('gender_id',$id)->orderBy('created_at', 'desc')->paginate(9);
        $content = View::make('front-end.shop.includes.index-inner', $this->data)->render();
        return response()->json([
            'content'   => $content
        ]);
    }
    public function getRangeFilter($min, $max) 
    {
        $this->data['products'] = Product::where('stock', '!=', '0')->whereBetween('price', [$min, $max])->orderBy('created_at', 'desc')->paginate(9);
        $content = View::make('front-end.shop.includes.index-inner', $this->data)->render();
        return response()->json([
            'content'   => $content
        ]);
    }
    public function getID($id)
    {
        $star = [];
        $width = [];
        $check = 'no user';
        $product = Product::find($id);
        $count = Product_Review::where('product_id', $id)->count();
        $rate = $product->star();
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
            
            if ($wishlist === null) 
                $check = 0;
            else
                $check = 1;
        }
        
        for ($i = 1; $i <= 5; $i++) {
            $this->data['star_'.$i] = Product_Review::where('product_id', $id)->where('rate', $i)->count();
            if ($this->data['star_'.$i] == 0) 
                $this->data['width_' . $i] = 0;
            else 
                $this->data['width_' . $i] = ($this->data['star_'.$i] / $count) * 100;
            array_push($star, $this->data['star_' . $i]);
            array_push($width, $this->data['width_' . $i]);
        }
        $product_filter = Product_Filter::where('product_id', $id)->where('stock', '!=', '0')->first();
        return response()->json([
            'product'   => $product,
            'count'     => $count,
            'rate'      => $rate,
            'star'      => $star,
            'width'     => $width,
            'sub_product' => $product_filter,
            'check'     => $check
        ]);
    }
    public function getImage($id)
    {
        $product = Product_Filter::find($id);
        return response()->json([
            'product'     => $product
        ]);
    }
}
