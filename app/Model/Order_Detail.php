<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Order;
use App\Model\Product;
use App\Model\Cart_Detail;
use View, Crypt, Auth;

class Order_Detail extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'order_details';
    protected $with = ['product', 'size', 'sub_category'];
    protected $appends = ['sub_total'];

    public function order()
    {
        return $this->belongsTo('App\Model\Order');
    }
    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
    public function size()
    {
        return $this->belongsTo('App\Model\Category');
    }
    public function sub_category()
    {
        return $this->belongsTo('App\Model\Product_Filter');
    }
    public function product_return()
    {
        return $this->hasOne('App\Model\Product_Return', 'order_id', 'id');
    }
    public static function addOrderDetail($request, $id)
    {
        $cart_details = Cart_Detail::where('cart_id', Crypt::decrypt($request->cart_id))->get();
        foreach ($cart_details as $cart_detail) {
            $data = new self;
            $data->order_id = $id;
            $data->product_id = $cart_detail->product_id;
            $data->size = $cart_detail->size;
            // if ($cart_detail->sub_category_id !== null) {
            //     $data->sub_category_id = $cart_detail->sub_category_id;
            //     Product::minusStockCategory($cart_detail->sub_category_id,$cart_detail->quantity);
            // }
            $data->quantity = $cart_detail->quantity;
            $data->save();
            Cart_Detail::deleteItems($cart_detail->id);
            // Product::minusStock($cart_detail->product_id, $cart_detail->quantity);
        }
        return true;
    }
    public static function cancelOrderDetail($id)
    {
        $details = self::where('order_id', $id)->get();
        foreach($details as $detail) {
            $detail->delete();
        }
    }

    /*
        API Properties
    */
    public function getSubTotalAttribute()
    {
        if (isset($this->product->price) === true) {
            return (int)$this->quantity * (int)$this->product->price;
        }
        return 0;
    }

    public function subTotal()
    {
        if (isset($this->product->price) === true) {
            return (int)$this->getQuantity() * (int)$this->product->price;
        }
        return 0;
    }

    public function getQuantity()
    {
        if ($this->product_return != null) {
            if ($this->status == 2)
                return (int)$this->quantity - (int)$this->product_return->quantity;
        }
        return $this->quantity;
    }
}
