<?php

namespace App;

use App\Models\History;
use App\Models\Order;
use Illuminate\Notifications\Notifiable;
use Backpack\CRUD\CrudTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use CrudTrait;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_referral', 'phone', 'user_bank', 'name_bank', 'account_bank'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders(){
        return $this->hasMany(Order::class,'id_user','id');
    }

    public function histories(){
        return $this->hasMany(History::class,'user_id','id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($user) {
            $user->orders()->delete();
            $user->histories()->delete();
        });
    }
}
