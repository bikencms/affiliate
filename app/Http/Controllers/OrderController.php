<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\User;
use Illuminate\Http\Request;
use App\Models\Order;
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
        $packageName = $order->package->name;
        $packagePrice = $order->package->price;
        //calculator point
        $user_current = User::find($order->user->id);
        //calculator for user level higher 1
        $user_level1 = User::where('email', '=', $user_current->email_referral)->first();
        if( count((array)$user_level1) > 0 ) {
            $user_level1->point = $order->package->price * 0.3 + $user_level1->point;
            $user_level1->save();
            //add history bonus level 1
            $this->saveHistory($order->package->price * 0.3, "Hoa hồng giới thiệu gói $packageName $packagePrice\$", $order_id, $user_level1->id, $order->user->id);
            //calculator for user level higher 2
            $user_level2 = User::where('email', '=', $user_level1->email_referral)->first();
            if( count((array)$user_level2) > 0 ) {
                $user_level2->point = $order->package->price * 0.05 + $user_level2->point;
                $user_level2->save();
                //add history bonus level 2
                $this->saveHistory($order->package->price * 0.05, "Hoa hồng giới thiệu gói $packageName $packagePrice\$", $order_id, $user_level2->id, $order->user->id);
            }
        }
        if( $order->save() ) {
            $this->saveHistory(0, "Vừa kích hoạt xong gói $packageName $packagePrice\$", $order_id, $order->user->id, 0);
            return redirect()->route('order', $request->get('slug'))->with('success', "Active order $order->id successfully!");
        } else {
            return redirect()->route('order', $request->get('slug'))->with('warning', 'Something went wrong!');
        }
    }

    public function saveHistory($price = 0, $reason = null, $order_id = 0, $user_id = 0, $user_ref_id = 0) {
        $history = new History();
        $history->price = $price;
        $history->reason = $reason;
        $history->order_id = $order_id;
        $history->user_id = $user_id;
        $history->user_ref_id = $user_ref_id;
        $history->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect('order')->with('success', 'Order ' . $id . ' has been  deleted successfully!');
    }

}
