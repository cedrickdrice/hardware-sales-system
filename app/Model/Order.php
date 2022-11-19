<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\SendNotification;
use App\Model\Order_Detail;
use App\Model\Order_Notify;
use App\Model\Cart;
use App\User;

use Auth, Crypt, View;

class Order extends Model
{
    use SoftDeletes;
    use Notifiable;
    protected $dates = ['deleted_at'];
    protected $with = ['order_details'];
    protected $appends = ['total', 'order_status', 'date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function order_details()
    {
        return $this->hasMany('App\Model\Order_Detail');
    }
    public function order_notify()
    {
        return $this->hasMany('App\Model\Order_Notify');
    }
    public function return()
    {
        return $this->hasOne('App\Model\Product_Return');
    }
    public static function addOrder($request, $order_number)
    {
        $data = new self;
        $data->order_number = $order_number;
        $data->user_id = Auth::user()->id;
        $data->amount = Crypt::encrypt($request->grandtotal);
        if ( $request->address !== null && $request->contact_number2 !== null ) {
            $qwe = explode("+",$request->contact_number1);
            $asd = substr($request->contact_number2, '2');
            $data->phone_number = $qwe[0] . $asd;
            $data->address = $request->address;
        }
        if ( $request->label !== null )
            $data->type = '0';
        else 
            $data->type = '1';
        $data->save();
        $id = $data->id;
        Order_Detail::addOrderDetail($request, $id);
        Cart::deleteCart(Crypt::decrypt($request->cart_id));
        return $data;
    }
    public static function updateOrder($id, $status)
    {
        $data = self::find($id);
        if ($status === 'processed') 
            $data->status = '0';
        else if ($status === 'shipped') 
            $data->status = '1';
        else if ($status === 'delivered')
            $data->status = '2';
        else 
            $data->status = '3';
        $user = User::find($data->user_id);
//        $user->notify(new SendNotification($data));
//        Order_Notify::addNotif($status, $id);
        $data->save();
        return $data;
    }

    /*
        API Attributes
    */
    public function getTotalAttribute()
    {
        return explode(".", str_replace(",", "", (Crypt::decrypt($this->amount))))[0];
    }
    public function getOrderStatusAttribute()
    {
        if ($this->status == 0) {
            return 'Process';
        } elseif ($this->status == 1) {
            return 'Shipped';
        } elseif ($this->status == 2) {
            return 'Delivered';
        } elseif ($this->status == 3) {
            return 'Cancelled';
        }
    }
    public function getDateAttribute()
    {
        return date_format($this->created_at, 'M d, Y');
    }
    public function totalAmount()
    {
        $total = 0;
        foreach ($this->order_details as $order_detail) {
            $total += (int)$order_detail->subTotal();
        }
        return $total;
    }
    
}

