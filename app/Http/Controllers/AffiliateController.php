<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\Order;
use App\User;
use App\Http\Controllers\AdminController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'order_id' => 'required|int',
            'f1' => 'required|int',
            'f2' => 'required|int'
        ]);
    }

    public function index($order_id = 0)
    {
        if( is_numeric($order_id) && $order_id > 0 ) {
            $order = Order::where('status', 1)->where('id', $order_id)->first();
            if( $order->count() > 0 ) {
                return view('affiliate', compact('order'));
            } else {
                return redirect('/affiliate')->with('warning', "Order is not exits");
            }
        } else {
            return redirect('/affiliate')->with('warning', "Something went wrong");
        }
    }

    public function bonus(Request $request) {
        $this->validator($request->all())->validate();
        $order_id = $request->get('order_id', 0);
        $f1 = $request->get('f1', 0);
        $f2 = $request->get('f2', 0);
        $month = $request->get('month', '');
        if( is_numeric($order_id) && is_numeric($f1) && is_numeric($f2) && $month != '') {
            $isExitsAff = Affiliate::where('month', 'like', "%{$month}%")->get();
            if( $isExitsAff->count() > 0 ) {
                return redirect('/affiliate/'. $order_id)->with('warning', "Month $month is exits ");
            }
            $affiliate = new Affiliate();
            $affiliate->month = $month;
            $affiliate->status = 1;
            $order = Order::where('created_at', 'like', "%{$month}%")->where('status', 1)->where('id', $order_id)->first();
            if( $order->count() > 0 ) {
                $packageName = $order->package->name;
                $packagePrice = $order->package->price;
                $user_current = User::find($order->id_user);
                //calculator for user level higher 1
                $user_level1 = User::where('email', '=', $user_current->email_referral)->first();
                if( $user_level1->count() > 0 ) {
                    $user_level1->point = $f1 + $user_level1->point;
                    $user_level1->save();
                    //add history bonus level 1
                    $this->saveHistory($f1, "Lãi hàng tháng từ gói $packageName $packagePrice\$", $order->id, $user_level1->id, $order->id_user);
                    //calculator for user level higher 2
                    $user_level2 = User::where('email', '=', $user_level1->email_referral)->first();
                    if( $user_level2->count() > 0 ) {
                        $user_level2->point = $f2 + $user_level2->point;
                        $user_level2->save();
                        //add history bonus level 2
                        $this->saveHistory($f2, "Lãi hàng tháng từ gói $packageName $packagePrice\$", $order->id, $user_level2->id, $order->id_user);
                    }
                }
            } else {
                return redirect('/affiliate/'. $order_id)->with('info', "Month $month is not order.");
            }
            if( $affiliate->save() ) {
                return redirect('/affiliate/'. $order_id)->with('success', "Month $month is calculated bonus successfully! ");
            }
        }
    }
}
