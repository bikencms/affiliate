<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Controllers\AdminController as Controller;
class AffiliateController extends Controller
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
        if(app('request')->input('month') != '') {
            $month = app('request')->input('month');
        }
        return view('affiliate');
    }
}
