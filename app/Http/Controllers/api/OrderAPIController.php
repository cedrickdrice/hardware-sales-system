<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Model\Order;
use App\Model\Product_Return;
use Crypt;

class OrderAPIController extends Controller
{
    public function getOrders($user_id)
    {
        $user = User::find($user_id);
        if ($user != null)
            return response()->json($user->orders);
    }  
    public function getCancel($order_id)
    {
        $order = Order::updateOrder($order_id, 'cancel');

        if ($order != null) {
            return response()->json([
                'result'    => 'success',
                'message'   => 'Your order has been canceled.'
            ]);
        } else {
            return response()->json([
                'result'    => 'failed',
                'message'   => 'Something went wrong.'
            ]);
        }
    }
    public function postReturn(Request $request)
    {
        $success = Product_Return::insertReturn($request);

        if ($success) {
            return response()->json(['result' => 'success']);
        } else {
            return response()->json(['result' => 'failed']);
        }
    }

    public function getCrypt($amount)
    {
        return Crypt::encrypt($amount);
    }
}
