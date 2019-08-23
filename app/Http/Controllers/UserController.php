<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use App\User;
use App\Http\Controllers\AdminController as Controller;
class UserController extends Controller
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
        if(!$this->isAdmin()) {
            return abort(404);
        }
        $users = User::all();
        return view('manager_user', compact('users'));
    }
}
