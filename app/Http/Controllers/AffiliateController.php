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
            'bonus' => 'required|int',
        ]);
    }

    public function index($order_id = 0)
    {
        if( is_numeric($order_id) && $order_id > 0 ) {
            $order = Order::where('id', $order_id)->first();
            if( $order != '' && $order->status == 1 ) {
                return view('affiliate' , ['order_id' => $order_id] ,compact('order'));
            } elseif( $order != '' && $order->status == 2 ) {
                return redirect('order')->with('success', 'Order ' . $order_id . ' has been rewarded successfully!');
            } else {
                return redirect('order')->with('warning', 'Something went wrong');
            }
        } else {
            return redirect('order')->with('warning', "Something went wrong");
        }
    }

    public function bonus(Request $request) {
        $this->validator($request->all())->validate();
        $order_id = $request->get('order_id', 0);
        $bonus = $request->get('bonus', 0);
        $month = $request->get('month', '');
        if( is_numeric($order_id) && is_numeric($bonus) && $month != '') {
            $isExitsAff = Order::where('created_at', 'like', "%{$month}%")->where('status', 2)->where('id', $order_id)->first();
            if( $isExitsAff != '' ) {
                return redirect('/affiliate/'. $order_id)->with('warning', "Month $month is exits ");
            }
            $order = Order::where('created_at', 'like', "%{$month}%")->where('status', 1)->where('id', $order_id)->first();
            if( $order != '' ) {
                $order->status = 2;
                $order->save();
                $user_current = User::find($order->id_user);
                //calculator for user level 1
                $user_level1 = User::where('email', '=', $user_current->email_referral)->first();
                if( $user_level1 != '' ) {
                    $user_level1->point = $bonus * 0.3 + $user_level1->point;
                    $user_level1->save();
                    //add history bonus level 1
                    $this->saveHistory($bonus * 0.3, "Phát sinh hoa hồng hàng tháng", $order->id, $user_level1->id, $order->id_user);
                    //calculator for user level 2
                    $user_level2 = User::where('email', '=', $user_level1->email_referral)->first();
                    if( $user_level2 != '' ) {
                        $user_level2->point = $bonus * 0.05 + $user_level2->point;
                        $user_level2->save();
                        //add history bonus level 2
                        $this->saveHistory($bonus * 0.05, "Phát sinh hoa hồng hàng tháng", $order->id, $user_level2->id, $order->id_user);
                        //calculator for user level 3
                        $user_level3 = User::where('email', '=', $user_level2->email_referral)->first();
                        if( $user_level3 != '' ) {
                            $user_level3->point = $bonus * 0.05 + $user_level3->point;
                            $user_level3->save();
                            //add history bonus level 3
                            $this->saveHistory($bonus * 0.05, "Phát sinh hoa hồng hàng tháng", $order->id, $user_level3->id, $order->id_user);
                        }
                    }
                }
                //bonus admin and sub admin
                $admin = User::where('email', '=', 'cngovap@gmail.com')->first();
                $admin->point = $bonus * 0.1 + $admin->point;
                $admin->save();
                $this->saveHistory($bonus * 0.1, "Thưởng do phát sinh hoa hồng hàng tháng của $order->user->email", $order_id, $admin->id, $order->user->id);

                $subAdmin = User::where('email', '=', 'Litiadsnew@gmail.com')->first();
                $subAdmin->point = $bonus * 0.02 + $subAdmin->point;
                $subAdmin->save();
                $this->saveHistory($bonus * 0.02, "Thưởng do phát sinh hoa hồng hàng tháng của $order->user->email", $order_id, $subAdmin->id, $order->user->id);
            } else {
                return redirect('/affiliate/'. $order_id)->with('info', "Month $month is not order.");
            }
            if( $order->save() ) {
                return redirect('/affiliate/'. $order_id)->with('success', "Month $month is calculated bonus successfully! ");
            }
        }
    }
}
