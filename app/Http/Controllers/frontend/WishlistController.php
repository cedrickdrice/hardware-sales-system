<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Cart_Detail;
use App\Model\Wishlist;
use App\User;
use View,Crypt,Auth;
class WishlistController extends Controller
{
    public function getIndex()
    {
        $this->data['wishlists'] = Wishlist::where('user_id', Auth::user()->id)->get();
        return view('front-end.wishlist.index', $this->data);
    }
    public function getAddToCart($id)
    {
        $user_id = Auth::user()->id;
        $success = Wishlist::addToCart($id,$user_id);
        if ( $success ) 
            $this->data['snackbar'] = "Item Successfully Added in Cart";
        else 
            $this->data['snackbar'] = "Not enough stock for this product";
        return redirect('/cart');
        // $this->data['cart'] = User::find(Auth::user()->id)->cart;
        // return view('front-end.cart.index', $this->data);
    }
    public function getDelete($id)
    {
        Wishlist::find($id)->delete();
        $this->data['wishlists'] = Wishlist::where('user_id', Auth::user()->id)->get();
        $content = View::make('front-end.wishlist.includes.index-inner', $this->data)->render();
        return response()->json([
            'content'       => $content,
            'snackbar'      => "Deleted Successfully"
        ]);
    }
    public function getAdd($id)
    {
        $user_id = Auth::user()->id;
        $wishListItem = Wishlist::addItem($id, $user_id);
        if ($wishListItem != null) {
            return response()->json([
                'result' => 'success',
                'id' => $wishListItem->product->id
            ]);
        } else {
            return response()->json(['result' => 'failed']);
        }
    }
    public function getRemove($id)
    {
        $user_id = Auth::user()->id;
        $id = Wishlist::removeItem($id, $user_id);
        return response()->json([
            'result' => 'success',
            'id' => $id
        ]);
        
    }
}
