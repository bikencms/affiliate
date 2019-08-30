<?php

namespace App\Http\Controllers;
use App\Models\RoleUser;
use App\Models\History;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        view()->composer('layouts.app', function () {
            view()->with('isAdmin', '1');
        });
    }

    public function isAdmin() {
        $role_user = RoleUser::where([['user_id', '=', \Auth::user()->id],['role_id', '=', 1]])->first();
        if($role_user == '') {
            return false;
        }
        if( count((array)$role_user) > 0) {
            return true;
        }
    }

    public function saveHistory($price = 0, $reason = null, $order_id = 0, $user_id = 0, $user_ref_id = 0, $type = 0) {
        $history = new History();
        $history->price = $price;
        $history->reason = $reason;
        $history->order_id = $order_id;
        $history->user_id = $user_id;
        $history->user_ref_id = $user_ref_id;
        $history->type = $type;
        $history->save();
    }
}
