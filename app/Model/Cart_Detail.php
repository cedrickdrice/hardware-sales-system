<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Cart;
use App\Model\Product;
use App\Model\Product_Filter;
use View,Crypt,Auth;

class Cart_Detail extends Model
{
    protected $table = 'cart_details';
    protected $with = ['product', 'product_filters'];
    protected $appends = ['sub_total'];

    public function cart()
    {
        return $this->belongsTo('App\Model\Cart');
    }
    public function product()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }
    public function product_filters()
    {
        return $this->belongsTo('App\Model\Product_Filter', 'sub_category_id');
    }
    public function size()
    {
        return $this->belongsTo('App\Model\Category');
    }
    public static function addQuantity($request, $id)
    {
        $data = self::find($id);
        $item_quantity = $data->quantity;
        $data->quantity = $item_quantity + $request->quantity;
        $data->save();
        return true;
    }
    public static function addOneQuantity($id,$stock)
    {
        $data = self::find($id);
        $item_quantity = $data->quantity;
        $data->quantity = $item_quantity + 1;
        if ( $stock > $item_quantity + 1) {
            $sub_product = Product_Filter::find($data->sub_category_id);   
            $sub_product->stock -= 1;
            $sub_product->used_stock += 1;
            $sub_product->save();
            $data->save();
            return $data;
        }
        return false;
    }
    public static function addQuantityByProduct($request)
    {
        $data = self::where('sub_category_id', $request->sub_category_id)
                    ->where('cart_id', $request->cart_id)
                    ->first();
        $item_quantity = $data->quantity;
        $data->quantity = $item_quantity + $request->quantity;
        $data->save();
        return true;
    }
    public static function addItem($request, $id)
    {
        $data = new self;
        $data->cart_id = $id;
        $data->product_id = $request->id;
        $data->sub_category_id = $request->sub_category_id;
        $data->size = "small";
        $data->quantity = $request->quantity;
        $data->save();

        return true;
    }
    public static function addOneItem($id, $cart_id, $sub_id)
    {
        $data = new self;
        $data->cart_id = $cart_id;
        $data->product_id = $id;
        $data->sub_category_id = $sub_id;
        $data->quantity = 1;
        $sub_product = Product_Filter::find($sub_id);
        $sub_product->stock -= 1;
        $sub_product->used_stock += 1;
        $sub_product->save();
        // $product_filter = Product_Filter::where('product_id', $id)->first();
        // $data->sub_category_id = $product_filter->id;
        $data->save();
        return true;
    }
    public static function deleteItems($id)
    {

        $cart_item = self::find($id);

        $product_filter = Product_Filter::find($cart_item->sub_category_id);
        $product_filter->stock = (int)$product_filter->stock + (int)$cart_item->quantity;
        $product_filter->save();

        $cart_item->delete();
        return true;
    }
    public function sub_total()
    {
        $total = 0;
        $total = $this->product->price * $this->quantity;
        return $total;
    }
    public static function update_quantity($id, $quantity)
    {
        $data = self::find($id);
        $data->quantity = $quantity;
        // $sub_product = Product_Filter::find($data->sub_category_id);
        // $data->stock -= $quantity;
        // $data->used_stock += $quantity;
        // $sub_product->save();
        $data->save(); 
    }
    public static function addItemWishlist($product_id, $cart_id)
    {
        $data = new self;
        $data->cart_id = $cart_id;
        $data->product_id = $product_id;
        $sub_product = Product_Filter::where('product_id',$product_id)->first();
        $sub_product->stock -= 1;
        $sub_product->used_stock += 1;
        $sub_product->save();
        $data->sub_category_id = $sub_product->id;
        $data->quantity = '1';
        $data->save();
        return true;
    }
    public static function updateQuantityWishlist($id, $quantity)
    {
        $data = self::find($id);
        if ( $data->product->stock > $data->quantity + $quantity ){
            $data->quantity = $data->quantity + $quantity;
            $data->save(); 
            return true;
        } else 
            return false;
        
    }

    /*
        Property for API
    */
    public function getSubTotalAttribute()
    {
        return $this->sub_total();
    }
    public static function changeColor($product_id, $id)
    {
        $data = self::find($id);
        if ( $product_id === 'default')
            $data->sub_category_id = null;
        else {
            $old_product = Product_Filter::find($data->sub_category_id);
            $old_product->stock += $data->quantity;
            $old_product->used_stock -= $data->quantity;
            $old_product->save();
            $data->sub_category_id = $product_id;
        }
           
        $new_product = Product_Filter::find($product_id);
        $new_product->stock -= $data->quantity;
        $new_product->used_stock += $data->quantity;
        $new_product->save();
        $cart = self::find($id)->cart;
        foreach($cart->items as $item) {
            if ( (int)$item->sub_category_id == (int)$product_id ){
                return false;
            }
        }
        $data->save();
        return $data;
    }
    public static function changeSize($size_id,$id)
    {
        $data = self::find($id);
        $data->size = $size_id;
        $data->save();
        return $data;
    }
    public static function removeItem($id)
    {
        $data = self::find($id);
        $sub_product = Product_Filter::find($data->sub_category_id);
        $sub_product->stock += 1;
        $sub_product->used_stock -= 1;
        $sub_product->save();
        $data->delete();
    }
}
