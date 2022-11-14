<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{    
    protected $table = "product_by_option";
    protected $with = ['category'];
    
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
}
