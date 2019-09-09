<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
class Withdraw extends Model
{
    protected $fillable = [ 'user_id', 'point', 'status', 'reason', 'user_bank', 'name_bank', 'account_bank'];

    public function users() {
        return $this->hasMany(User::class,'user_id','id');
    }
}
