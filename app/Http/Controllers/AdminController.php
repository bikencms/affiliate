<?php

namespace App\Http\Controllers;
use App\Models\RoleUser;
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
        print_r($role_user); die;
        if( count($role_user) > 0 ) {
            return true;
        }
        return false;
    }
}
