<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Order_Detail;
class Product_Return extends Model
{
    protected $table = "returned_products";
    protected $with = ['order', 'product'];

    public function order_detail()
    {
        return $this->belongsTo('App\Model\Order_Detail');
    }
    public function order()
    {
        return $this->belongsTo('App\Model\Order');
    }
    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
    public static function insertReturn($request)
    {
        $data = new self;
        $data->product_id = $request->product_id;
        $data->order_id = $request->order_id;
//        $data->quantity = $request->quantity;
        $data->buyer_note = $request->buyer_note;
        $data->save();

        $order_detail = Order::where('id', $request->order_id)->first();
        $order_detail->status = 1;
        $order_detail->save();
        return true;
    }
    public static function updateReturn($id, $status)
    {
        $data = Order_Detail::find($id);
        if ($status == 'accept') 
            $data->status = '2';
        else 
            $data->status = '3';
        $data->save();

        return $data;
    }
}
