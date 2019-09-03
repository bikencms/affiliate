<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController as Controller;
use Backpack\CRUD\Tests\Unit\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
        $countUser = DB::table('users')->count();
        $countPackageActive = DB::table('orders')->where('status', 1)->count();
        $countPackageNonActive = DB::table('orders')->where('status', 0)->count();
        $countPackage = DB::table('orders')->where('status', 0)->orWhere('status', 1)->count();

        $bonus = DB::table('histories')->where('user_ref_id', 0)->select('*', DB::raw('SUM(price) as total_sales'))->get();

        return view('dashboard', compact('countUser', 'countPackageActive', 'countPackageNonActive', 'countPackage'));
    }

}
