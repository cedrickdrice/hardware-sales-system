<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth;
class User_Address extends Model
{
    protected $table = 'user_address';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public static function manageData($request, $id = 0)
    {
        $data               = self::findOrNew($id);
        $data->user_id      = Auth::user()->id;
        $data->full_name    = $request->full_name;
        $data->address      = $request->address;
        $data->post_code    = $request->post_code;
        $data->phone_number = $request->phone_number;
        $data->save();
    }
}
