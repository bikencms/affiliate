<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $fillable = [ 'id_user', 'id_package', 'status'];

    public function user() {
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function package() {
        return $this->belongsTo(Package::class,'id_package','id');
    }
}
