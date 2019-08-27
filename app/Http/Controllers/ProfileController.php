<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Controllers\AdminController as Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
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
        $histories = History::orderBy('created_at', 'DESC')->where('user_id', \Auth::user()->id)->get();
        $packageQuantity = Order::where('id_user', \Auth::user()->id)->where('status', 1)->count();
        $package = DB::select('select sum(price) as packageSum from orders o left join packages p on o.id_package = p.id left join users u on u.id = o.id_user where o.status = 1 and u.id ='. \Auth::user()->id);
        $packageSum = 0;
        if($package[0]->packageSum != '') {
            $packageSum = $package[0]->packageSum;
        }
        $affiliateSum = History::where('user_id', \Auth::user()->id)->sum('price');
        return view('profile', compact('histories', 'packageQuantity', 'packageSum', 'affiliateSum'));
    }

}
