<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Controllers\AdminController as Controller;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class WithdrawController extends Controller
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

    protected function validator(array $data)
    {
        if( $data['phone'] > 0 ) {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['string', 'max:11', 'min:10'],
                'bank_account' => ['string', 'max:50'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        } else {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'bank_account' => ['string', 'max:50'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $packageQuantity = Order::where('id_user', \Auth::user()->id)->whereIn('status', [1,2])->count();
        $packageSumBonus = History::where('user_id', \Auth::user()->id)->where('type', 1)->sum('price');
        $affiliateSum = History::where('user_id', \Auth::user()->id)->where('type', 0)->sum('price');
        return view('withdraw', compact('packageQuantity', 'affiliateSum', 'packageSumBonus'));
    }
}
