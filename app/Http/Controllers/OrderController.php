<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\RoleUser;
use App\Http\Controllers\AdminController as Controller;
class OrderController extends Controller
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
        $orders = Order::all();
        return view('order', compact('orders'));
    }

    public function active(Request $request) {
        if(!$this->isAdmin()) {
            return abort(404);
        }
        $order_id = $request->get('id_order');
        $order = Order::find($order_id);
        $order->status = 1;
        $order->save();
        //calculator point
        $user_current = User::find($order->user->id);
        //calculator for user level higher 1
        $user_level1 = User::where('email', '=', $user_current->email_referral)->first();
        if( count((array)$user_level1) > 0 ) {
            $user_level1->point = $order->package->price * 0.3 + $user_level1->point;
            $user_level1->save();
            //calculator for user level higher 2
            $user_level2 = User::where('email', '=', $user_level1->email_referral)->first();
            if( count((array)$user_level2) > 0 ) {
                $user_level2->point = $order->package->price * 0.05 + $user_level2->point;
                $user_level2->save();
            }
        }
        if( $order->save() ) {
            return redirect()->route('order', $request->get('slug'))->with('success', "Active $$order->id successfully!");
        } else {
            return redirect()->route('order', $request->get('slug'))->with('warning', 'Something went wrong!');
        }
    }

}
