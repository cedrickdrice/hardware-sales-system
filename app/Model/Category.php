<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany('App\Model\Product');
    }
    public function product_filter()
    {
        return $this->hasMany('App\Model\Product_Filter');
    }
    public function product_genders()
    {
        return $this->hasMany('App\Model\Product', 'gender_id');
    }
    public static function manageData($request)
    {
        $data = new self;
        $check = self::where('name', $request->name)->first();
        if ( $check !== null) 
            return false;
        $data->name = $request->name;
        if ( $request->label === 'color') {
            $data->type = $request->label;
        } else 
            $data->type = 'product';
        $data->save();
        return true;
    }
}
