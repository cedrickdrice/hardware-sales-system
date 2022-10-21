<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LogTrail extends Model
{
    protected $table = "log_trails";
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public static function insertLog($user_id)
    {
        $data = new self;
        $data->user_id = $user_id;
        $data->log_date = date('Y-m-d');
        $data->save();
    }
    public static function logOut($id)
    {
        $data = self::find($id);
        $data->log_out = Carbon::now('Asia/Tokyo')->subHour();
        $data->save();
    }

}
