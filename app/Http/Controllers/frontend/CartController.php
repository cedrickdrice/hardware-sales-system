<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Cart_Detail;
use App\Model\Product;
use App\Model\Product_Filter;
use App\Model\Wishlist;
use App\Model\Category;
use App\User;
use View,Crypt,Auth;

class CartController extends Controller
{
    public function getIndex()
    {
        $this->data['cart'] = User::find(Auth::user()->id)->cart;
        // $this->data['sizes'] = Category::where('type', 'size')->get();
        $this->data['snackbar'] =  "List of Items";
        return view('front-end.cart.index', $this->data);
    }
    public function postInsert(Request $request)
    {
        // dd($request);
        $user_id = Auth::user()->id;
        $check = User::find(Auth::user()->id)->cart;
        $check_stock = Product::find($request->id);
        if ( $check_stock->stock <= $request->quantity ) {
            if ( Auth::check() ) {
                $user_id = Auth::user()->id;
                $this->data['check'] = Wishlist::checkProduct($request->id, $user_id);
            } else 
                $this->data['check'] = 1;
            $this->data['product'] = Product::find($request->id);
            $this->data['snackbar'] = "Not enough stock, there are only " . $check_stock->stock . " left.";
            return view('front-end.product.modal-index',$this->data);
        }
            
        if ($check === null ) {
            $addCart = Cart::addCart($user_id);
            $id = $addCart;
        } else 
            $id = $check->id; 
            
        $existing_item = Cart_Detail::where('cart_id', $id)->where('product_id', $request->id)->first();
        if ( $existing_item === null )
            $addItem = Cart_Detail::addItem($request, $id);
        else {
            $existing_item_id = $existing_item->id;
            $addQuantity = Cart_Detail::addQuantity($request, $existing_item_id);
        }
        // $this->data['cart'] = User::find(Auth::user()->id)->cart;
        // $this->data['sizes'] = Category::where('type', 'size')->get();
        // $this->data['snackbar'] =  "Item Successfully Added in Cart";
        // return view('front-end.cart.index', $this->data);
        return redirect('/cart');
    }
    public function getInsert($id, $sub_id)
    {
        $user_id = Auth::user()->id;
        $check = User::find(Auth::user()->id)->cart;
        $check_stock = Product_Filter::find($sub_id);
        $quantity = 1;
        if ( $check_stock->stock < $quantity ) {
            if ( Auth::check() ) {
                $user_id = Auth::user()->id;
                $this->data['check'] = Wishlist::checkProduct($id, $user_id);
            } else 
                $this->data['check'] = 1;
            $this->data['product'] = Product::find($id);
            $this->data['snackbar'] = "Not enough stock, there are only " . $check_stock->stock . " left.";
            return view('front-end.product.modal-index',$this->data);
        }
            
        if ($check === null ) {
            $addCart = Cart::addCart($user_id);
            $cart_id = $addCart;
        } else 
            $cart_id = $check->id; 
            
        $existing_item = Cart_Detail::where('cart_id', $cart_id)->where('sub_category_id', $sub_id)->first();
        if ( $existing_item === null )
            $addItem = Cart_Detail::addOneItem($id, $cart_id, $sub_id);
        else {
            $existing_item_id = $existing_item->id;
            $addQuantity = Cart_Detail::addOneQuantity($existing_item_id,$check_stock->stock);
            if ( $addQuantity == null ) {
                return redirect('cart')->with(['info' => "Not enough stock, cannot be added in your cart"]);
            }
        }
        return redirect('cart');
    }
    public function getDelete($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        Cart_Detail::removeItem($decrypted_id);
        // Cart_Detail::find($decrypted_id)->delete();
        $this->data['cart'] = User::find(Auth::user()->id)->cart;
        $this->data['sizes'] = Category::where('type', 'size')->get();
        $content = View::make('front-end.cart.includes.inner-index', $this->data)->render();
        return response()->json([
            'content'       => $content,
            'word'      => 'The item has been removed'
        ]);
    }
    public function postUpdate(Request $request)
    {
        $check = Cart_Detail::find($request->id);
        if ( $check->product_filters->stock >= $request->quantity) {
            Cart_Detail::update_quantity($request->id, $request->quantity);
            $this->data['cart'] = User::find(Auth::user()->id)->cart;
            $this->data['sizes'] = Category::where('type', 'size')->get();
            $content = View::make('front-end.cart.includes.inner-index', $this->data)->render();
            return response()->json([
                'content'       => $content,
                'cart'          => $this->data['cart'],
                'word'          => 'Updated Successfully'
            ]);
        } else {
            $this->data['cart'] = User::find(Auth::user()->id)->cart;
            $this->data['sizes'] = Category::where('type', 'size')->get();
            $content = View::make('front-end.cart.includes.inner-index', $this->data)->render();
            return response()->json([
                'content'       => $content,
                'word'      => 'Not enough stock for ' . $check->product_filters->product->name . ', color : ' . $check->product_filters->category->name . ', '. $check->product_filters->stock . ' left.'
            ]);
        }
        
    }
    public function postPayment(Request $request)
    {
        $oGetCart = Cart::find($request->cart_id);
        if ($oGetCart === null) {
            return redirect('/account');
        }
        $data['total'] = $request->grandtotal;
        $data['id'] = $request->cart_id;
        return view('front-end.cart.payment.index', $data);
    }
    public function getChangeColor($product_id,$id) 
    {
        
        $check = Cart_Detail::changeColor($product_id,$id);
        $this->data['cart'] = User::find(Auth::user()->id)->cart;
        $this->data['sizes'] = Category::where('type', 'size')->get();
        $content = View::make('front-end.cart.includes.inner-index', $this->data)->render();
        if ($check == null) {
            return response()->json([
                'content'   => $content,
                'word'      => 'The same color with other product',
            ]);
        }
        return response()->json([
            'content'   => $content,
            'word'      => 'Updated Successfully',
        ]);
    }
    public function getChangeSize($size_id,$id)
    {
        Cart_Detail::changeSize($size_id,$id);
        $this->data['cart'] = User::find(Auth::user()->id)->cart;
        // $this->data['sizes'] = Category::where('type', 'size')->get();
        $content = View::make('front-end.cart.includes.inner-index', $this->data)->render();
        return response()->json([
            'content'   => $content,
            'word'      => 'Updated Successfully'
        ]);
    }
}
