<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Product;
use App\Model\Category;
use App\Model\Order_Detail;
use App\Model\Product_Review;

class ProductAPIController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return response()->json($products);
    }
    public function getSearch($keyword)
    {
        $products = Product::whereHas('category', function($q) use($keyword){
                            $q->where('name', 'LIKE', "%$keyword%");
                        })->orWhere('name', 'LIKE', "%$keyword%")
                        ->get();
        return response()->json($products);
    }
    public function getFilterByCategory($id)
    {
        $products = Product::where('category_id', $id)->get();
        return response()->json($products);
    }
    public function getLimit($offset, $limit)
    {
        $products = Product::orderBy('id', 'DESC')->offset($offset)->limit($limit)->get();
        return response()->json($products);
    }
    public function getSearchLimit($keyword, $offset, $limit)
    {
        $products = Product::whereHas('category', function($q) use($keyword){
                            $q->where('name', 'LIKE', "%$keyword%");
                        })->orWhere('name', 'LIKE', "%$keyword%")
                        ->offset($offset)
                        ->limit($limit)
                        ->get();
        return response()->json($products);
    }
    public function getFilterByCategoryLimit($id, $offset, $limit)
    {
        $products = Product::where('category_id', $id)->offset($offset)->limit($limit)->get();
        return response()->json($products);
    }
    public function getFilterByCategoryAndGender($category_id, $gender_id)
    {
        $products = Product::where('category_id', $category_id)
                            ->where(function($query) use($gender_id){
                                $query->where('gender_id', $gender_id)
                                        ->orWhere('gender_id', 19);
                            })
                            ->get();
        return response()->json($products);
    }
    public function getScan($code)
    {
        $product = Product::where('barcode', $code)->first();
        return response()->json($product);
    }
    public function getSizes()
    {
        $sizes = Category::where('type', 'size')->get();
        return response()->json($sizes);
    }
    public function getLatest()
    {
        $lastest_product = Product::orderBy('id', 'DESC')->first();
        return response()->json($lastest_product);
    }
    public function getMostPopular()
    {
        $popular_product = Order_Detail::selectRaw('product_id, count(product_id) as products')->groupBy('product_id')->orderBy('products','desc')->first();
        if ($popular_product != null)
            return response()->json(Product::find($popular_product->product_id));
    }
    public function postAddReview(Request $request)
    {
        $product_review = Product_Review::findOrNew($request->id);
        $product_review->product_id = $request->product_id;
        $product_review->user_id = $request->user_id;
        $product_review->comment = $request->comment;
        $product_review->rate = $request->rate;
        $product_review->save();

        return response()->json($product_review);
    }
    public function getFindReview($product_id, $user_id)
    {
        $product_review = Product_Review::where('product_id', $product_id)
                                        ->where('user_id', $user_id)
                                        ->first();

        if ($product_review != null) {
            return response()->json($product_review);
        }
    }
}
