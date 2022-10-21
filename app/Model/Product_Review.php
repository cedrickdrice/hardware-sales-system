<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_Review extends Model
{
    protected $table = "product_review";
    protected $guarded = [''];
    protected $with = ['user'];

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public static function addReview($request, $user_id)
    {
        $data = new self;
        $data->user_id = $user_id;
        $data->product_id = $request->product_id;
        $data->comment = $request->comment;
        $data->rate = $request->rate;
        $data->save();
        return $data;
    }
}
