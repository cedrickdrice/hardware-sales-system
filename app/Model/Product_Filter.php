<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_Filter extends Model
{
    protected $table = "product_by_subcategory";
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
    public static function addItem($image, $category_id, $stock, $id, $upload_file)  
    {
        $data = new self;
        $zip_file_name = '';
        if ($image === null) {
            $data->image                = 'default.png'; 
        } else {
            $path                       = 'public/products/';
            $data->image                = Helper::filtNotRequest($image,'image', $path);
        }
        if ( $upload_file === null ) {
            $data->upload_file          = 'default.fbx';
        } else {
            $path                       = 'public/fvx/';
            $zip_file_name              = Helper::filtNotRequest($upload_file,'upload_file', $path);
            $data->upload_file          = explode(".", $zip_file_name)[0];    
        }
        $data->product_id = $id;
        $data->category_id = $category_id;
        $data->stock = $stock;

        if (strpos($zip_file_name, '.zip') !== false) {
            //extract then upload each file
            $file = $upload_file;
            $pathToExtract = "storage/fvx/" . $data->upload_file;
            $files = Helper::extractZip($file,  $pathToExtract);

            $data->fbx = serialize($files);

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
