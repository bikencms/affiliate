<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Controllers\AdminController as Controller;
use App\Models\Order;
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
        return Validator::make($data, [
            'point' => 'required|int|min:50',
            'user_bank' => 'required|string',
            'name_bank' => 'required|string',
            'account_bank' => 'required|string'
        ]);
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

    public function review(Request $request) {
        $this->validator($request->all())->validate();
        $point = $request->get('point', 0);
        $user = \Auth::user();
        if($point > $user->point) {
            return redirect('/withdraw')->with('warning', 'Bạn không đủ tiền để thực hiện chức năng này!');
        }
        $user_bank = $request->get('user_bank', '');
        $name_bank = $request->get('name_bank', '');
        $account_bank = $request->get('account_bank', '');
        if ( is_numeric($point) && $point >= 50 && $user_bank != '' && $name_bank != '' && is_numeric($account_bank) ) {
            session()->flash('flash_point', $point);
            session()->flash('flash_user_bank', $user_bank);
            session()->flash('flash_name_bank', $name_bank);
            session()->flash('flash_account_bank', $account_bank);
            return redirect('/withdraw-confirm');
        } else {
            return redirect('/withdraw')->with('warning', 'Something went wrong');
        }
    }

    public function confirm(Request $request) {
        $point = $request->get('point', 0);
        $user_bank = $request->get('user_bank', '');
        $name_bank = $request->get('name_bank', '');
        $account_bank = $request->get('account_bank', '');
        if ( is_numeric($point) && $point >= 50 && $user_bank != '' && $name_bank != '' && is_numeric($account_bank) ) {
            $user = \Auth::user();
            $hasher = app('hash');
            $password = $request->get('password', '');
            if ($password != '') {
                if ($hasher->check($password, $user->password)) {
                    session()->flash('flash_withdraw_message', 1);
                    return redirect('/withdraw-confirm')->with('success', "Khớp lệnh thành công!");
                } else {
                    return redirect('/withdraw-confirm')->with('warning', "Mật khẩu không đúng!");
                }
            }
        } else {
            return redirect('/withdraw')->with('warning', 'Something went wrong');
        }
    }

}
