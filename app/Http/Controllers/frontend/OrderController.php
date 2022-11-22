<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Model\Order;
use App\Model\Product;
use App\Model\Product_Filter;
use App\Model\Order_Notify;
use App\Model\Category;
use App\Model\Order_Detail;
use App\User;

use View, Crypt, Auth, Validator;

class OrderController extends Controller
{
    public function getIndex()
    {
        $this->data['orders'] = Order::where('user_id', Auth::user()->id)->where('status', '!=', '3')->orderBy('created_at', 'desc')->get();
        // dd($this->data['orders']);
        return view('front-end.order.index', $this->data);
    }
    public function getDetail($id)
    {
        $d_id = Crypt::decrypt($id);
        $this->data['order'] = Order::find($d_id);
        return view('front-end.order.detail-index', $this->data);
    }
    function checkoutValidation(Request $request)
    {
        $validation = [
            'name'    => 'required',
            'number'     => 'required',
            'expiry'         => 'required',
            'cvv'       => 'required',
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()){
            return response()->json(['result' => 'failed', "errors" => $validator->errors()->messages()]);
        }
        
        return response()->json(['result' => 'success']);
    }

    public function postInsert(Request $request)
    {
        if ($request->address === null && $request->contact_number2 === null) {
            $check = User::find(Auth::user()->id);
            if ( $check->address === null ){
                return redirect('/cart')->with(['info' => 'Set up your address and contact number first']);
            }
                
        }
        // dd($request);
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = Customer::create(array(            
            "email"     => Auth::user()->email,
            'source'  => $request->stripeToken
        ));

        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $request->grandtotal * 100, 
            'currency' => 'php',
            "description" => "SAM Apparel"
        ));


        
        $order = Order::all();
        $order_total = count($order) + 1;
        if ( strlen($order_total) == 1 )
            $order_total = '00' . $order_total;
        else if ( strlen($order_total) == 2)
            $order_total = '0' . $order_total;
        $order_number = 'ord' . $order_total ;
        $order = Order::addOrder($request, $order_number);
        $order_id = $order->id;
        $status = 0;
        Order_Notify::addNotif($status, $order_id);
        return redirect('/account#recentOrders');
    }

    public function postInsertCod(Request $request)
    {
        // dd($request);
        
        if ($request->address === null && $request->contact_number2 === null) {
            $check = User::find(Auth::user()->id);
            if ( $check->address === null )
                return redirect('/cart')->with(['info' => 'Set up your address and contact number first']);
        }
        $order = Order::all();
        $order_total = count($order) + 1;
        if ( strlen($order_total) == 1 )
            $order_total = '00' . $order_total;
        else if ( strlen($order_total) == 2)
            $order_total = '0' . $order_total;
        $order_number = 'ord' . $order_total ;
        $order = Order::addOrder($request, $order_number);
        $order_id = $order->id;
        $status = 0;
        Order_Notify::addNotif($status, $order_id);
        return redirect('/account#recentOrders');
    }

    public function getProductReview($id,$ord_id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $order_id = Crypt::decrypt($ord_id);
        $this->data['order'] = Order::find($order_id);
        $this->data['product'] = Product::find($decrypted_id);
        return view('front-end.order.review', $this->data);
    }
    public function getCancel($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        // Order_Detail::cancelOrderDetail($decrypted_id);
        $order = Order::find($decrypted_id);
        $order->status = '3';
        $order->save();
        $details = Order_Detail::where('order_id', $order->id)->get();
        foreach($details as $detail) {
            // $product = Product::find($detail->product_id);
            // $product->stock += $detail->quantity;
            // $product->used_stock -= $detail->quantity;
            // $product->save();
            Product_Filter::cancelItem($detail->sub_category_id, $detail->quantity);
        }
        return redirect('/account#recentOrders');

    }
    public function getReturn($id,$ord_id)
    {
        $product_id = Crypt::decrypt($id);
        $order_id = Crypt::decrypt($ord_id);
        $this->data['order'] = Order::find($order_id);
        $this->data['product'] = Product::find($product_id);
        return view('front-end.order.returned', $this->data);
    }
}
