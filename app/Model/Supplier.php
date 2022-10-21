<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "supplier";
    public static function updateMe($request)
    {
        $data = self::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone_number = $request->phone_number;
        $data->save();
    }
}
