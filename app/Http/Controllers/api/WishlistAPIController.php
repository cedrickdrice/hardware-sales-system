<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Wishlist;

class WishlistAPIController extends Controller
{
    public function getIndex($user_id)
    {
       $wishlist = Wishlist::where('user_id', $user_id)->get();
       return response()->json($wishlist);
    }
    public function postAddItem(Request $request) 
    {
        $wishlist = Wishlist::addItem($request->id, $request->user_id);
        return response()->json($wishlist);
    }
    public function getRemoveItem($wishlist_id)
    {
        Wishlist::find($wishlist_id)->delete();
        return response()->json([
            'result'    => 'success',
            'message'   => 'Item removed.'
        ]);
    }
    public function getRemoveItemByProduct($product_id, $user_id) {
        Wishlist::where('product_id', $product_id)
                ->where('user_id', $user_id)
                ->first()
                ->delete();
        return response()->json([
            'result'    => 'success',
            'message'   => 'Item removed.'
        ]);
    }
}
