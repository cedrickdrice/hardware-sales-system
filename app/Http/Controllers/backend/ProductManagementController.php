<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Order;
use App\Model\Order_Detail;
use App\Model\Product_Filter;
use App\Model\Product_Return;
use App\Model\Category;
use App\Model\AuditTrail;
use App\Model\Supplier;
use App\User;
use View,Crypt,Hash,Auth;

class ProductManagementController extends Controller
{
    public function getIndex()
    {
        $this->data['products'] = Product::select('*')->orderBy('created_at', 'desc')->paginate(5);
        $this->data['colors'] = Category::where('type', 'color')->get();
        $this->data['categories'] = Category::where('type', 'gender')->get();
        $this->data['categ_products'] = Category::where('type', 'product')->get();
        $this->data['sizes'] = Category::where('type','size')->get();
        // dd(get_class($this->data['products']));
        return view('back-end.products.index', $this->data);
    }
    public function postInsert(Request $request)
    {
        $validated = $request->validate(Product::validate());
        if ($validated) {
            Product::manageData($request);
            $this->data['products'] = Product::select('*')->orderBy('created_at', 'desc')->paginate(5);
            $content = View::make('back-end.products.includes.index-inner', $this->data)->render();
            return response()->json([
                'content'    => $content,
                'word'      => 'Product has been added into database'
            ]);
        }
    }
    public function getDelete($id)
    {
        Product::find($id)->delete();
        $user_id = Auth::user()->id;
        $comment = "Icp management has deleted the " . $id . " product";
        AuditTrail::insertComment($user_id, $comment);
        $this->data['products'] = Product::select('*')->orderBy('created_at', 'desc')->paginate(5);
        $content = View::make('back-end.products.includes.index-inner', $this->data)->render();
        return response()->json([
            'content'       => $content,
            'word'      => 'Product has been removed.'
        ]);
    }
    public function getFilter($word)
    {
        if ( $word === 'All') {
            $this->data['products'] = Product::select('*')->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $category_id = Category::where('name', $word)->first();
            $this->data['products'] = Product::where('category_id', $category_id->id)->orderBy('created_at', 'desc')->paginate(5);
        }
        
        $content = View::make('back-end.products.includes.index-inner', $this->data)->render();
        return response()->json([
            'content'       => $content,
            'word'          => $word
        ]);
    }
    public function getSearch($word)
    {
        //$category_id = Category::where('name', $word)->first();
        // $this->data['label'] = "search";
        $this->data['products'] = Product::orWhere('name', 'like', '%' . $word . '%')
          //                          ->orWhere('category_id', $category_id->id)
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(5);
        $content = View::make('back-end.products.includes.index-inner', $this->data)->render();
        return response()->json([
            'content'       => $content
        ]);                            
    }
    public function getEdit($id)
    {
        $this->data['product'] = Product::find($id);
        $this->data['product_filter'] = Product_Filter::where('product_id', $id)->get();
        $content = View::make('back-end.products.includes.index-inner-inner', $this->data)->render();
        return response()->json([
            'product'   => $this->data['product'],
            'content'   => $content
        ]);
    }
    public function postUpdate(Request $request)
    {
        $validated = $request->validate(Product::update_validate());
        if ($validated) {
            Product::updateProduct($request);
            $this->data['products'] = Product::select('*')->orderBy('created_at', 'desc')->paginate(5);
            $content = View::make('back-end.products.includes.index-inner', $this->data)->render();
            return response()->json([
                'content'    => $content,
                'word'      => 'Product has been updated.'
            ]);
        }
    }
    public function getPriceEdit($id)
    {
        $this->data['product'] = Product::find($id);
        return response()->json([
            'product'   => $this->data['product']
        ]);
    }
    public function getRemoveStock($id)
    {
        $this->data['product'] = Product::find($id);
        $this->data['product_filter'] = Product_Filter::where('product_id', $id)->get();
        $content = View::make('back-end.products.includes.index-subproduct', $this->data)->render();
        return response()->json([
            'product'   => $this->data['product'],
            'content'   => $content
        ]);
    }
    public function postUpdatePrice(Request $request)
    {
        $validated = $request->validate(Product::update_price());
        
        if ($validated) {
            if (Hash::check($request->m_password, Auth::user()->password)) {
                Product::updatePrice($request);
                $this->data['products'] = Product::select('*')->orderBy('created_at', 'desc')->paginate(5);
                $content = View::make('back-end.products.includes.index-inner', $this->data)->render();
                return response()->json([
                    'content'    => $content
                ]);
            }
            return response()->json([
                'error'   => 'invalid manager\'s password'
            ]);

        } else {

            return response()->json([
                'error'   => 'invalid price'
            ]);

        }

       
       
    }
    public function postUpdateStock(Request $request)
    {
        $validated = $request->validate(Product::update_stock());

        if ($validated) {
            if (Hash::check($request->password, Auth::user()->password)) {
                $subproduct = Product_Filter::find($request->options);
                if ($request->stock > $subproduct->stock) {
                    return response()->json([
                        'error'   => 'Please input the amount that is smaller or equal than the actual stock'
                    ]);
                } else {
                    Product::updateStock($request);
                    $this->data['products'] = Product::select('*')->orderBy('created_at', 'desc')->paginate(5);
                    $content = View::make('back-end.products.includes.index-inner', $this->data)->render();
                    return response()->json([
                        'content'    => $content
                    ]);
                }
            }
     
            return response()->json([
                'error'   => 'invalid password'
            ]);
            

        }   
    }
    public function getReturnIndex()
    {
        $this->data['returns'] = Product_Return::all();
        return view('back-end.return.index', $this->data);
    }
    public function getReturnDetail($id)
    {
        $this->data['return'] = Product_Return::find($id);
        $detail = Order_Detail::find($this->data['return']->order_id);
        $user = Order::find($detail->order_id)->user;
        $strtotime = date('F d, Y', strtotime($detail->created_at));
        $content = View::make('back-end.return.include.index-inner-inner', $this->data)->render();
        return response()->json([
            'content'   => $content,
            'detail'     => $detail,
            'user'      => $user,
            'date'      => $strtotime
        ]);
    }
    public function getReturnUpdate($id,$status)
    {
        $data = Product_Return::updateReturn($id,$status);
        $user_id = Auth::user()->id;
        $comment = 'the product '. $data->order_number . ' has been ' . $status . ' by ' . Auth::user()->type;
        AuditTrail::insertComment($user_id, $comment);
        $this->data['returns'] = Product_Return::all();
        $content = View::make('back-end.return.include.index-inner', $this->data)->render();
        return response()->json([
            'content'   => $content,
        ]);
    }
    public function getSupplier()
    {
        $this->data['supplier'] = Supplier::all();
        return view('back-end.supplier.index',$this->data);
    }
    public function getEditSupplier($id)
    {
        $this->data['supplier'] = Supplier::find($id);
        return response()->json($this->data['supplier']);
    }
    public function postUpdateSupplier(Request $request)
    {
        Supplier::updateMe($request);
        $this->data['supplier'] = Supplier::all();
        $content = View::make('back-end.supplier.includes.index', $this->data)->render();
        return response()->json([
            'content'   => $content,
        ]);
    }
}
