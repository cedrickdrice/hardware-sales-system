<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order_Notify extends Model
{
    protected $table = "notify_order";

    public function order()
    {
        return $this->belongsTo('App\Model\Order');
    }
    public static function addNotif($status, $id)
    {
        $data = new self;
        $data->order_id = $id;
        if ( $status == 'processed') 
            $data->comment = "Your order is being processed at the moment.";
        else if ( $status == 'shipped')
            $data->comment = "Your order has been shipped by our courier.";
        else
            $data->comment = "Your order has been delivered by our courier.";
        $data->save(); 
    }
}
