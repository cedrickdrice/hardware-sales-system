<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MirrorLog extends Model
{
    protected $table = 'mirror_logs';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public static function login($id)
    {
        $data = self::where('status', 1)->orderBy('id', 'DESC')->get();
        foreach ($data as $d) {
            $d->status = 0;
            $d->save();
        }
        $newUserLog = new self;
        $newUserLog->user_id = $id;
        $newUserLog->save();

        return $newUserLog->user;
    }
    public static function logout($id)
    {
        $data = self::where('user_id', $id)->orderBy('id', 'DESC')->get();
        foreach ($data as $d) {
            $d->status = 0;
            $d->save();
        }
    }
    public static function getLoggedInUser()
    {
        return self::where('status', 1)
                    ->orderBy('updated_at', 'DESC')
                    ->first();
    }
}
