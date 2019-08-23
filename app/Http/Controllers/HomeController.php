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
        if($this->isAdmin()) {
            $isAdmin = 1;
        }

        $packages = Package::all();
        return view('package', compact('packages', 'isAdmin'));
    }

}
