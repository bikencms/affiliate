<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class History extends Model
{
    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function userRef() {
        return $this->belongsTo(User::class,'user_ref_id','id');
    }
}
