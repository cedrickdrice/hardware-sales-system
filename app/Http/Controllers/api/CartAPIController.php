<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

use App\Model\Cart;
use App\Model\Cart_Detail;
use App\Model\Order;
use App\Model\Order_Detail;
use App\Model\Product_Filter;

use Crypt;

class CartAPIController extends Controller
{
    public function getIndex($user_id)
     {
        $cart = Cart::where('user_id', $user_id)->first();
        if ($cart == null) {
            $cart = Cart::addCart($user_id);
            return response()->json(Cart::find($cart));
        }
        return response()->json($cart);
    }
    public function getAll()
    {
        return response()->json(Cart::all());
    }
    public function getAllByPlatform($user_id, $platform)
    {
        $cart = Cart::byPlatform($user_id, $platform);
        return response()->json($cart);
    }
    public function postAddItem(Request $request) 
    {

        $sub_category = Product_Filter::find($request->sub_category_id);

        if ((int)$sub_category->stock < (int)$request->quantity) {
            return null;
        }
        else {
            $item = Cart_Detail::where('sub_category_id', $request->sub_category_id)
                                ->where('cart_id', $request->cart_id)
                                ->first();
            if ($item == null) {
                Cart_Detail::addItem($request, $request->cart_id);
            } else {
                Cart_Detail::addQuantityByProduct($request);
            }

            $lastInsertedItem = Cart_Detail::where('cart_id', $request->cart_id)
                                    ->orderBy('updated_at', 'DESC')
                                    ->first();
            
            $sub_category->stock = (int)$sub_category->stock - (int)$request->quantity;
            $sub_category->save();

            return response()->json($lastInsertedItem);
        }
        

    }

    public function getRemoveItem($item_id)
    {
        $success = Cart_Detail::deleteItems($item_id);
        if ($success) {
            return response()->json([
                'result'    => 'success',
                'message'   => 'Item removed.'
            ]);
        } else {
            return response()->json([
                'result'    => 'failed',
                'message'   => 'Something went wrong.'
            ]);
        }
    } 
    public function postUpdate(Request $request)
    {
        $item = Cart_Detail::find($request->item_id);

        $old_quantity = $item->quantity;
        $added_quantity = (int)$request->quantity - (int)$item->quantity;
        $sub_category = Product_Filter::find($item->sub_category_id);
        $sub_category->stock = ((int)$sub_category->stock + (int)$old_quantity) - (int)$added_quantity;

        $item->quantity = $request->quantity;
        $item->sub_category_id = $request->sub_category_id;
        $item->size = $request->size;
        $item->save();
        return response()->json($item);
    }
    public function postPayment(Request $request)
    {
        $cart                   = Cart::find($request->cart_id);
        $maxId                  = (int)Order::orderBy('id', 'DESC')->first()->id + 1;
        $order                  = new Order;
        $order->order_number    = $this->formatOrderNumber($maxId);
        $order->user_id         = $cart->user_id;
        $order->type            = $request->type;
        $order->status          = $request->status;
        $order->amount          = Crypt::encrypt($cart->total());
        $order->phone_number    = $request->phone_number;
        $order->address         = $request->address;

        $order->save();

        /*
            move all cart_detail to order_detail
        */
        foreach ($cart->items as $item) {
            $order_detail                   = new Order_Detail;
            $order_detail->order_id         = $order->id;
            $order_detail->product_id       = $item->product->id;
            $order_detail->quantity         = $item->quantity;
            $order_detail->sub_category_id  = $item->sub_category_id;
            $order_detail->size             = $item->size;
            $order_detail->save();

            //deduct the stocks
            $item->product->stock = (int)$item->product->stock - (int)$order_detail->quantity;
            $item->product->save();
            
            //remove item from cart_details table
            $item->delete();
        }
        $cart->delete();
        return response()->json([
                'result'    => 'success',
                'message'   => 'Payment success.'
            ]);
    }

    private function formatOrderNumber($max)
    {
        $newOrderNumber = 'ORD';
        $len = strlen((string)$max);
        for ($i = $len; $i < 3; $i++) {
            $newOrderNumber .= '0';
        }
        return $newOrderNumber . (string)$max;
    }

}
