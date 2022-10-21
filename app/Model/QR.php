<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QR extends Model
{
    use SoftDeletes;
    protected $table = "qr_codes";

    public static function createNew()
    {
        self::orderBy('id')->delete();
        $data = new self;

        $length = 10;
        $code = '';
        $characters = array_merge(range(0, 9), range('A', 'Z'));
    
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[array_rand($characters)];
        }

        $data->code = $code;
        $data->save();
        return $data;
    }
    public static function checkValidity($code)
    {
        $data = self::where('code', $code)->first();
        return $data != null;
    }
}
