<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Cart_Detail;
use App\User;
use Crpyt, Auth;

class Cart extends Model
{
    protected $with = ['user', 'items'];
    protected $appends = ['total'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function items()
    {
        return $this->hasMany('App\Model\Cart_Detail');
    }

    public static function addCart($user_id, $platform = 2)
    {
        $data = new self;
        $data->user_id = $user_id;
        $data->platform = $platform;
        $data->save();
        $id = $data->id;
        return $id;
    }
    public static function byPlatform($user_id, $platform)
    {
        $data = self::where('user_id', $user_id)
                    ->where('platform', $platform)
                    ->first();
        return $data;
    }
    public static function deleteCart($id)
    {
        self::find($id)->delete();
        return true;
    }
    public function total()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->product->price * $item->quantity;
        }
        return $total;

    }

    /*
        Attribute for API
    */
    public function getTotalAttribute()
    {
        return $this->total();
    }
}
