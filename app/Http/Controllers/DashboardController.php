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
        $countPackageActive = DB::table('orders')->where('status', 1)->orWhere('status', 2)->count();
        $countPackageNonActive = DB::table('orders')->where('status', 0)->count();
        $countPackage = $countPackageActive + $countPackageNonActive;

        $currentYear = date('Y');
        $bonusMonths = [];
        $affiliateMonths = [];
        for( $i = 1; $i <= 12; $i++ ) {
            if($i > 9) {
                $monthYear = $currentYear . '-' . $i;
                $bonus = DB::table('histories')->where('user_ref_id', 0)->where('created_at', 'like', "%{$monthYear}%")->select('*', DB::raw('SUM(price) as total_sales'))->get();
                if($bonus[0]->total_sales != '') {
                    array_push($bonusMonths, $bonus[0]->total_sales);
                } else {
                    array_push($bonusMonths, 0);
                }
                $affiliate = DB::table('histories')->where('user_ref_id', '!=', 0)->where('created_at', 'like', "%{$monthYear}%")->select('*', DB::raw('SUM(price) as total_sales'))->get();
                if($affiliate[0]->total_sales != '') {
                    array_push($affiliateMonths, $affiliate[0]->total_sales);
                } else {
                    array_push($affiliateMonths, 0);
                }
            } else {
                $monthYear = $currentYear . '-0' . $i;
                $bonus = DB::table('histories')->where('user_ref_id', 0)->where('created_at', 'like', "%{$monthYear}%")->select('*', DB::raw('SUM(price) as total_sales'))->get();
                if($bonus[0]->total_sales != '') {
                    array_push($bonusMonths, $bonus[0]->total_sales);
                } else {
                    array_push($bonusMonths, 0);
                }
                $affiliate = DB::table('histories')->where('user_ref_id', '!=', 0)->where('created_at', 'like', "%{$monthYear}%")->select('*', DB::raw('SUM(price) as total_sales'))->get();
                if($affiliate[0]->total_sales != '') {
                    array_push($affiliateMonths, $affiliate[0]->total_sales);
                } else {
                    array_push($affiliateMonths, 0);
                }
            }
        }
        return view('dashboard', compact('countUser', 'countPackageActive', 'countPackageNonActive', 'countPackage', 'bonusMonths', 'affiliateMonths'));
    }

}
