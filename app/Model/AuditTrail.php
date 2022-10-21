<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    protected $table = "audit_trails";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public static function insertComment($user_id, $comment)
    {
        $data = new self;
        $data->user_id = $user_id;
        $data->comment = $comment;
        $data->save();
        return $data;
    }
}
