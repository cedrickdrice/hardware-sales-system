<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\AuditTrail;
use View,Crypt,Auth;

class OrderManagementController extends Controller
{
    public function getIndex()
    {
        $this->data['orders'] = Order::orderBy('created_at','desc')->paginate(10);
        return view("back-end.orders.index", $this->data);
    }
    public function getOrder($id)
    {
        $order = Order::find($id);
        $user = Order::find($id)->user;
        $decrypted_amount = Crypt::decrypt($order->amount);
        $strtotime = date('F d, Y', strtotime($order->created_at));
        $this->data['order'] = Order::find($id);
        $content = View::make('back-end.orders.includes.index-inner-inner', $this->data)->render();
        return response()->json([
            'content'   => $content,
            'order'     => $order,
            'user'      => $user,
            'amount'    => $decrypted_amount,
            'date'      => $strtotime
        ]);
    }
    public function getUpdate($id, $status)
    {
        $data = Order::updateOrder($id,$status);
        $user_id = Auth::user()->id;
        $comment = 'the order '. $data->order_number . ' has been ' . $status . ' by you.';
        AuditTrail::insertComment($user_id, $comment);
        $this->data['orders'] = Order::orderBy('created_at', 'desc')->paginate(10);
        $content = View::make('back-end.orders.includes.index-inner', $this->data)->render();
        return response()->json([
            'content'   => $content,
        ]);
    }
    public function getSearch($keyword)
    {
        $this->data['orders'] = Order::orWhere('order_number', 'like', '%'. $keyword .'%')
                                        // ->orWhere('name', 'like', '%'. $keyword . '%')
                                        ->paginate(10);
                                        
        $content = View::make('back-end.orders.includes.index-inner', $this->data)->render();
        return response()->json([
            'content'   => $content,
        ]);
    }
}
