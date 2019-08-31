<?php

namespace App\Http\Controllers;
use App\Models\RoleUser;
use App\Models\Package;
use App\Http\Controllers\AdminController as Controller;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $isAdmin = 0;
        if (isset(\Auth::user()->id)) {
            $role_user = RoleUser::where([['user_id', '=', \Auth::user()->id], ['role_id', '=', 1]])->first();
            if (count((array)$role_user) > 0) {
                return redirect('dashboard');
            }
        }

        return redirect('profile');
    }

}
