<?php

namespace App\Http\Controllers\frontend;

use App\Model\Cart;
use GuzzleHttp\Client;
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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
            "description" => "Lyka Hardware & Construction Supply"
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
        return redirect('/order/detail/' . Crypt::encrypt($order->id));
    }

    public function postInsertCod(Request $request)
    {
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
        $order = Order::addOrder($request, $order_number, $request->reference_number);
        $order_id = $order->id;
        $status = 0;
        Order_Notify::addNotif($status, $order_id);
        return redirect('/order/detail/' . Crypt::encrypt($order->id));
    }

    public function postInsertPaymongo(Request $request)
    {
        if ($this->checkPaymentStatus($request->reference_number) === false) {
            return response()->json([
                'status' => 'failed'
            ], 200);
        }
        $order = Order::all();
        $order_total = count($order) + 1;
        if ( strlen($order_total) == 1 )
            $order_total = '00' . $order_total;
        else if ( strlen($order_total) == 2)
            $order_total = '0' . $order_total;
        $order_number = 'ord' . $order_total ;
        $request->cart_id = Crypt::encrypt($request->cart_id);
        $order = Order::addOrder($request, $order_number, $request->reference_number);
        $order_id = $order->id;
        $status = 0;
        Order_Notify::addNotif($status, $order_id);
        return response()->json([
            'status' => 'success'
        ], 200);
    }

    private function checkPaymentStatus($reference_number)
    {
        $oClient = new Client();
        $URI = 'https://api.paymongo.com/v1/links?reference_number=' . $reference_number;
        $params['headers'] = [
            'accept' => 'application/json',
            'authorization' => 'Basic c2tfdGVzdF9xUnBBWkU2b0Njc045aXNjQUtvU0tpWjk6',
        ];
        $response = $oClient->request('GET', $URI, [
            'headers' => $params['headers'],
        ]);

        $oResponse = json_decode($response->getBody(), true);
        if (empty($oResponse['data']) === false && $oResponse['data'][0]['attributes']['status'] === 'paid') {
            return true;
        }
        return false;
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

    public function doCreatePaymentLink(Request $request)
    {
        $oGetCart = Cart::find($request->id);
        if ($oGetCart === null) {
            return response()->json([
                'error' => 'Cart not found'
            ], 402);
        }

        try {
            $oClient = new Client();
            $URI = 'https://api.paymongo.com/v1/links';
            $params['headers'] = [
                'accept' => 'application/json',
                'authorization' => 'Basic c2tfdGVzdF9xUnBBWkU2b0Njc045aXNjQUtvU0tpWjk6',
                'content-type' => 'application/json',
            ];
            $params['form_params'] = array(
                'data'  => array(
                    'attributes' => array(
                        'amount' => ($oGetCart->total() * 100),
                        'description' => 'Lyka - Hardware & Construction Supply : Order #' . str_pad($request->id, 8, "0", STR_PAD_LEFT)
                    )
                )
            );
            $response = $oClient->request('POST', $URI, [
                'body' => json_encode($params['form_params']),
                'headers' => $params['headers'],
            ]);

            $oResponse = json_decode($response->getBody(), true);
            return response()->json([
                'status' => 'success',
                'data' => $oResponse['data']['attributes']
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Cart not found'
            ], 402);
        }
    }
}
