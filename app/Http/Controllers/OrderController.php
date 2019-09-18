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
        //calculator for user level 1
        $user_level1 = User::where('email', '=', $user_current->email_referral)->first();
        if( count((array)$user_level1) > 0 ) {
            $user_level1->point = $order->package->price * 0.3 + $user_level1->point;
            $user_level1->save();
            //add history bonus level 1
            $this->saveHistory($order->package->price * 0.3, "Hoa hồng giới thiệu gói $packageName $packagePrice\$", $order_id, $user_level1->id, $order->user->id);
            //calculator for user level 2
            $user_level2 = User::where('email', '=', $user_level1->email_referral)->first();
            if( count((array)$user_level2) > 0 ) {
                $user_level2->point = $order->package->price * 0.05 + $user_level2->point;
                $user_level2->save();
                //add history bonus level 2
                $this->saveHistory($order->package->price * 0.05, "Hoa hồng giới thiệu gói $packageName $packagePrice\$", $order_id, $user_level2->id, $order->user->id);
                $user_level3 = User::where('email', '=', $user_level2->email_referral)->first();
                //calculator for user level 3
                if( count((array)$user_level3) > 0 ) {
                    $user_level3->point = $order->package->price * 0.05 + $user_level3->point;
                    $user_level3->save();
                    //add history bonus level 2
                    $this->saveHistory($order->package->price * 0.05, "Hoa hồng giới thiệu gói $packageName $packagePrice\$", $order_id, $user_level3->id, $order->user->id);
                }
            }
        } else {
            $admin = User::where('email', '=', 'cngovap@gmail.com')->first();
            $admin->point = $order->package->price * 0.3 + $admin->point;
            $admin->save();
            $this->saveHistory($order->package->price * 0.3, "Hoa hồng giới thiệu gói $packageName $packagePrice\$", $order_id, $admin->id, $order->user->id);

            $subAdmin = User::where('email', '=', 'Litiadsnew@gmail.com')->first();
            $subAdmin->point = $order->package->price * 0.05 + $subAdmin->point;
            $subAdmin->save();
            $this->saveHistory($order->package->price * 0.05, "Hoa hồng giới thiệu gói $packageName $packagePrice\$", $order_id, $subAdmin->id, $order->user->id);
        }
        //bonus admin and sub admin
        $admin = User::where('email', '=', 'cngovap@gmail.com')->first();
        $admin->point = $order->package->price * 0.1 + $admin->point;
        $admin->save();
        $this->saveHistory($order->package->price * 0.1, "Hoa hồng giới thiệu gói $packageName $packagePrice\$", $order_id, $admin->id, $order->user->id);

        $subAdmin = User::where('email', '=', 'Litiadsnew@gmail.com')->first();
        $subAdmin->point = $order->package->price * 0.02 + $subAdmin->point;
        $subAdmin->save();
        $this->saveHistory($order->package->price * 0.02, "Hoa hồng giới thiệu gói $packageName $packagePrice\$", $order_id, $subAdmin->id, $order->user->id);
        if( $order->save() ) {
            $this->saveHistory(0, "Vừa kích hoạt xong gói $packageName $packagePrice\$", $order_id, $order->user->id, 0);
            return redirect()->route('order', $request->get('slug'))->with('success', "Active order $order->id successfully!");
        } else {
            return redirect()->route('order', $request->get('slug'))->with('warning', 'Something went wrong!');
        }
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
