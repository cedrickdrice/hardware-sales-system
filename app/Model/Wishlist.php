<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Cart_Detail;
use App\Model\Cart;
use App\Model\Product;

class Wishlist extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $with = ['product'];

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
    public static function addToCart($id,$user_id)
    {  
        $data = self::find($id);
        if ( $data->product->stock == 0 ) {
            return false;
        }
        $check_cart = Cart::where('user_id',$user_id)->first();
        if ( $check_cart !== null) 
            $cart_id = $check_cart->id;
        else 
            $cart_id = Cart::addCart($user_id);
        $check_detail = Cart_Detail::where('cart_id', $cart_id)->where('product_id', $data->product_id)->first();
        if ( $check_detail === null)
            Cart_Detail::addItemWishlist($data->product_id, $cart_id);
        else {
            $quantity = 1;
            $success = Cart_Detail::updateQuantityWishlist($check_detail->id,$quantity);
            if (!$success)
                return false;
        }
        $data->delete();
        return true;
    }
    public static function addItem($id, $user_id)
    {
        // $exist = self::checkProduct($id, $user_id);
        // if ($exist) {
            $data = new self;
            $data->user_id = $user_id;
            $data->product_id = $id;
            $data->save();
            return $data;
        // }
    }

    public static function removeItem($id, $user_id)
    {
        self::where('user_id', $user_id)->where('product_id', $id)->first()->delete();
        return $id;
    }

    public static function checkProduct($id, $user_id)
    {
        $data = self::where('user_id', $user_id)->where('product_id', $id)->first();
        if ( $data !== null ) 
            return true;
        else
            return false;
    }
}
