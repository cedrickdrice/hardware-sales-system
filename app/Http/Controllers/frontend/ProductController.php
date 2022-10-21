<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Wishlist;
use App\Model\Product_Review;
use App\Model\Product_Return;
use View,Crypt,Auth;

class ProductController extends Controller
{
    public function getIndex($id)
    {
        $decrpyted_id = Crypt::decrypt($id);
        if ( Auth::check() ) {
            $user_id = Auth::user()->id;
            $this->data['check'] = Wishlist::checkProduct($decrpyted_id, $user_id);
        } else {
            $this->data['check'] = 0;   
        }
        $this->data['snackbar'] = "";
        $this->data['product'] = Product::find($decrpyted_id);
        $count = Product_Review::where('product_id', $decrpyted_id)->count();
        for ($i = 1; $i <= 5; $i++) {
            $this->data['star_' . $i] = Product_Review::where('product_id', $decrpyted_id)->where('rate', $i)->count();
            if ($this->data['star_' . $i] == 0) 
                $this->data['width_' . $i] = 0;
            else 
                $this->data['width_' . $i] = ($this->data['star_' . $i] / $count) * 100;
        }
            
        return view('front-end.product.modal-index',$this->data);
    }
    public function postAddReview(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = Product_Review::addReview($request, $user_id);

        $encrypted_id = Crypt::encrypt($request->product_id);
        return redirect('/')->with(['info' => 'You have successfully reviewed the product']);
    }
    public function postAddReturn(Request $request)
    {
        Product_Return::insertReturn($request);
        
        return redirect('/')->with(['info' => 'You have successfully inquired the product, wait for the admin response']);
    }
}
