<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Helper;
use App\Model\Category;
use App\Model\Product_Filter;
use Auth;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $appends = ['rate'];
    protected $with = ['category', 'product_reviews', 'product_filters'];

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }
    public function cart_detail()
    {
        return $this->hasOne('App\Model\Cart_Detail');
    }
    public function order_detail()
    {
        return $this->hasOne('App\Model\Order_Detail');
    }
    public function wishlist()
    {
        return $this->hasOne('App\Model\Wishlist');
    }
    public function product_reviews()
    {
        return $this->hasMany('App\Model\Product_Review');
    }
    public function product_filters()
    {
        return $this->hasMany('App\Model\Product_Filter');
    }
    public function return()
    {
        return $this->hasOne('App\Model\Product_Return');
    }
    public static function validate() 
    {
        return [
            'name'          => 'required|string|max:191',
            'description'   => 'required|string|max:255',
            'price'         => 'required|max:50',
            'delivery_price'=> 'required',
            'category'      => 'required',
            'options'       => 'required',
            'sizes'         => 'required',
            'color_ids'     => 'required',
            'color_images'  => 'required',
            'upload_files'  => 'required',
            'stock'         => 'required'
        ];
    }
    public static function update_validate() 
    {
        return [
            'name'          => 'required|string|max:191',
            'description'   => 'required|string|max:255',
            'price'         => 'required|max:50',
            'delivery_price'=> 'required',
            'stock'         => 'required'
        ];
    }
    public static function update_price()
    {
        return [
            'price'         => 'required|max:20',
            'm_password'    => "required"
        ];
        
    }
    public static function update_stock()
    {
        return [
            'options'   => 'required',
            'stock'     => 'required',
            'password'  => 'required'
        ];
    }
    public static function manageData($request, $id = 0)
    {
        $check = self::where('name', $request->name)->first();
        if ($check !== null) {
            return true;
        }
        $createNewAndHasNoImage         = (($id === 0) && $request->addImage === null);
        $requestHasImage                =  $request->addImage !== null;

        $data                           = self::findOrNew($id);
        $data->name                     = $request->name;
        $string                         = strtolower($request->category);
        $category                       = Category::where('name', $string)->first();
        $data->category_id              = $category->id;
        $data->description              = $request->description;
        $vat = ($request->price * 12)/100;
        $data->price                    = $request->price + $vat;
        $data->delivery_price           = $request->delivery_price;
        $data->gender_id                = $request->options;
        
        $path                       = 'public/products/';
        $data->image                = Helper::filtNotRequest($request->color_images[0], 'image', $path);
        $concat = implode(",",$request->sizes);
        // $serialize = serialize($request->sizes);
        $data->sizes = $concat;

        $count = count($request->color_ids);
        $total = 0;
        for ($i = 0; $i < $count; $i++ ) {
            $total += $request->stock[$i];
        }
        $total += $request->mainStock;
        $data->stock                    = $total;

        $last = self::orderBy('id','desc')->first();
        if ( $last == null) {
            $code = 1;
        } else {
            $last_id = $last->id;
            $code = $last_id + 1;
        }
        $data->barcode                  = date('Ymd') . $code;
        $data->save();

        for ($i = 0; $i < $count; $i++) {
            Product_Filter::addItem($request->color_images[$i], $request->color_ids[$i], $request->stock[$i], $data->id, $request->upload_files[$i]);
        }
        $user_id = Auth::user()->id;
        $comment = "Icp management added a product, " . $data->name . " with a price of " . $data->price;
        AuditTrail::insertComment($user_id, $comment);
        return true;
    }
    public static function updateProduct($request)
    {
        $data = self::find($request->id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->delivery_price = $request->delivery_price;

        if ($request->updateCategory != '')
            $data->category_id = $request->updateCategory;
            
        $data->save();
        $count = count($request->sub_ids);
        for ($i = 0; $i < $count; $i++) {
            Product_Filter::updateItem($request->sub_ids[$i], $request->stock[$i]);
        }
        return true;
    }
    public static function minusStock($id, $quantity)
    {
        $data = self::find($id);
        $data->stock = $data->stock - $quantity;
        $data->used_stock = $data->used_stock + $quantity;
        $data->save();
        return true;
    }
    public static function minusStockCategory($id, $quantity)
    {
        $data = Product_Filter::find($id);
        $data->stock = $data->stock - $quantity;
        $data->used_stock = $data->used_stock + $quantity;
        $data->save();
        return true;
    }
    public function star()
    {
        return ($this->getRate() / 100) * 5;
    }
    public function getRate()
    {
        $sum = 0;
        foreach ($this->product_reviews as $review) {
            $sum += (int)$review->rate;
        }
        $totalStarCount = count($this->product_reviews) * 5;
        if ($totalStarCount == 0 ) {
            return 0;
        }
        return ($sum / $totalStarCount) * 100;
    }
    public function starsCountGroupByRate()
    {
        $stars = [];
        $total_reviews = count($this->product_reviews) ? count($this->product_reviews) : 1;
        for ($i = 5; $i > 0; $i--) {
            $count = Product_Review::where('product_id', $this->id)
                                ->where('rate', $i)
                                ->count();

            $stars[] = [
                'percent'   => ($count/$total_reviews) * 100,
                'star'      => $i, 
                'count'     => $count ];
        }

        return $stars;
    }
    public function totalStocks()
    {
        $totalStock = 0;
        foreach ($this->product_filters as $subCategory) {
            $totalStock += (int)$subCategory->stock;
        }
        return $totalStock;
    }
    public static function updatePrice($request)
    {
        $data = self::find($request->id);
        $data->price = $request->price;
        $data->save();
    }
    public static function updateStock($request)
    {
        $subproduct = Product_Filter::find($request->options);
        $subproduct->stock = $subproduct->stock - $request->stock;
        
        $data = self::find($request->id);
        $data->stock = $data->stock - $request->stock;

        $subproduct->save();
        $data->save();
    }


    /*
        for API
    */
    public function getRateAttribute()
    {
        return (int)$this->star();
    }
    
    
}



