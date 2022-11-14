<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_Filter extends Model
{
    protected $table = "product_by_option";
    protected $with = ['category'];
    protected $appends = ['fbx_files'];
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }
    public function cart_details()
    {
        return $this->hasMany('App\Model\Product', 'sub_category_id');
    }
    public static function addItem($image, $option_name, $stock, $id)  
    {
        $data = new self;
        $data->option_name = $option_name;
        $data->product_id = $id;
        $data->stock = $stock;

        if ($image === null) {
            $data->image                = 'default.png'; 
        } else {
            $path                       = 'public/products/';
            $data->image                = Helper::filtNotRequest($image,'image', $path);
        }

        $data->save();
    }

    public function getFbxFilesAttribute()
    {
        return unserialize($this->fbx);
    }
    public static function updateItem($sub_id, $stock)
    {
        $data = self::find($sub_id);
        $data->stock += $stock;
        $data->save();
        $product = Product::find($data->product_id);
        $product->stock += $stock; 
        $product->save();
        return $data;
    }
    public static function cancelItem($sub_id, $stock)
    {
        $data = self::find($sub_id);
        $data->stock += $stock;
        $data->used_stock -= $stock;
        $data->save();
    }
}
