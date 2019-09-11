<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Controllers\AdminController as Controller;
use App\Models\Order;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $histories = History::orderBy('created_at', 'DESC')->where('user_id', \Auth::user()->id)->get();
        $packageQuantity = Order::where('id_user', \Auth::user()->id)->whereIn('status', [1,2])->count();
        $packageSumBonus = History::where('user_id', \Auth::user()->id)->where('type', 1)->sum('price');
        $affiliateSum = History::where('user_id', \Auth::user()->id)->where('type', 0)->sum('price');
        $withdraws = Withdraw::where('user_id', \Auth::user()->id)->get();
        return view('profile', compact('histories', 'packageQuantity', 'affiliateSum', 'packageSumBonus', 'withdraws'));
    }

    public function showTree() {
        $user = \Auth::user();
        $trees = [];
        if( $user != '' ) {
            array_push($trees, $user);
            $children = $this->getChildren($user);
            if( $children != '' ) {
                $children2 = $this->getChildren($children);
                if( $children2 != '' ) {
                    $children3 = $this->getChildren($children2);
                    if( $children3 != '' ) {
                        array_push($trees, $children3);
                        array_push($trees, $children2);
                        array_push($trees, $children);
                    } else {
                        array_push($trees, $children2);
                        array_push($trees, $children);
                    }
                } else {
                    array_push($trees, $children);
                }
            }
        }
        return view('profile_show_tree', compact('trees', 'user'));
    }

    public function setting() {
        return view('setting');
    }

    public function saveSetting(Request $request) {
        $this->validator($request->all())->validate();
        $user = \Auth::user();
        $hasher = app('hash');
        $passwordCheck = $request->get('password', '');
        if( $passwordCheck != '' ) {
            if ($hasher->check($passwordCheck, $user->password)) {
                $name = $request->get('name', '');
                $phone = $request->get('phone', 0);
                $account_bank = $request->get('account_bank', '');
                $user_bank = $request->get('user_bank', '');
                $name_bank = $request->get('name_bank', '');
                if( $phone > 0 ) {
                    $user->phone = $phone;
                }
                if( $account_bank != '' ) {
                    $user->account_bank = $account_bank;
                }
                if( $user_bank != '' ) {
                    $user->user_bank = $user_bank;
                }
                if( $name_bank != '' ) {
                    $user->name_bank = $name_bank;
                }
                if( $name != '' ) {
                    $user->name = $name;
                }
                if($user->save()) {
                    return redirect('/setting')->with('success', 'Thông tin đã được cập nhật!');
                }
            } else {
                return redirect('/setting')->with('warning', 'Mật khẩu không chính xác!');
            }
        }

    }
}
