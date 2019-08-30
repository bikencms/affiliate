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
            'package_id' => 'required|int',
            'f1' => 'required|int',
            'f2' => 'required|int'
        ]);
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
            $packages = Order::where('created_at', 'like', "%{$month}%")->where('status', 1)->groupBy('id_package')->get();
        }
        return view('affiliate', compact('packages'));
    }

    public function bonus(Request $request) {
        $this->validator($request->all())->validate();
        $package_id = $request->get('package_id', 0);
        $f1 = $request->get('f1', 0);
        $f2 = $request->get('f2', 0);
        $month = $request->get('month', 0);
        if( is_numeric($package_id) && is_numeric($f1) && is_numeric($f2) ) {
            $isExitsAff = Affiliate::where('month', 'like', "%{$month}%")->get();
            if( $isExitsAff->count() > 0 ) {
                return redirect('/affiliate?month='. $month)->with('warning', "Month $month is exits ");
            }
            $affiliate = new Affiliate();
            $affiliate->month = $month;
            $affiliate->status = 1;
            $packages = Order::where('created_at', 'like', "%{$month}%")->where('status', 1)->where('id_package', $package_id)->get();
            if( $packages->count() > 0 ) {
                foreach ($packages as $package) {
                    $packageName = $package->package->name;
                    $packagePrice = $package->package->price;

                    $user_current = User::find($package->id_user);
                    //calculator for user level higher 1
                    $user_level1 = User::where('email', '=', $user_current->email_referral)->first();
                    if( $user_level1->count() > 0 ) {
                        $user_level1->point = $f1 + $user_level1->point;
                        $user_level1->save();
                        //add history bonus level 1
                        $this->saveHistory($f1, "Lãi hàng tháng từ gói $packageName $packagePrice\$", $package->id, $user_level1->id, $package->id_user);
                        //calculator for user level higher 2
                        $user_level2 = User::where('email', '=', $user_level1->email_referral)->first();
                        if( $user_level2->count() > 0 ) {
                            $user_level2->point = $f2 + $user_level2->point;
                            $user_level2->save();
                            //add history bonus level 2
                            $this->saveHistory($f2, "Lãi hàng tháng từ gói $packageName $packagePrice\$", $package->id, $user_level2->id, $package->id_user);
                        }
                    }
                }
            } else {
                return redirect('/affiliate?month='. $month)->with('info', "Month $month is not order.");
            }

            if( $affiliate->save() ) {
                return redirect('/affiliate?month='. $month)->with('success', "Month $month is calculated bonus successfully! ");
            }

        }
    }
}
