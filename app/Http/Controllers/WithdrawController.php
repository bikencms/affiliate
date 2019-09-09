<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Controllers\AdminController as Controller;
use App\Models\Order;
use App\Models\Withdraw;
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
        $user = \Auth::user();
        if($user->point < 50) {
            return redirect('/profile');
        }
        $withdraws = Withdraw::where('user_id', $user->id)->get();
        $packageQuantity = Order::where('id_user', \Auth::user()->id)->whereIn('status', [1,2])->count();
        $packageSumBonus = History::where('user_id', \Auth::user()->id)->where('type', 1)->sum('price');
        $affiliateSum = History::where('user_id', \Auth::user()->id)->where('type', 0)->sum('price');
        return view('withdraw', compact('packageQuantity', 'affiliateSum', 'packageSumBonus', 'withdraws'));
    }

    public function review(Request $request) {
        $point = $request->get('point', 0);
        $user = \Auth::user();
        if($point > $user->point) {
            return redirect('/withdraw')->with('warning', 'Bạn không đủ tiền để thực hiện chức năng này!');
        }
        $user_bank = $request->get('user_bank', '');
        $name_bank = $request->get('name_bank', '');
        $account_bank = $request->get('account_bank', '');
        $warning = $request->session()->get('flash_withdraw_message_warning');
        if($warning) {
            return view('withdraw_confirm', compact( 'point', 'user_bank', 'name_bank', 'account_bank', 'warning'));
        }
        $this->validator($request->all())->validate();
        if ( is_numeric($point) && $point >= 50 && $user_bank != '' && $name_bank != '' && is_numeric($account_bank) ) {
            return view('withdraw_confirm', compact( 'point', 'user_bank', 'name_bank', 'account_bank'));
        } else {
            return redirect('/withdraw-review')->with('warning', 'Đã xảy ra lỗi!');
        }
    }

    public function confirm(Request $request) {
        $point = $request->get('point', 0);
        $user_bank = $request->get('user_bank', '');
        $name_bank = $request->get('name_bank', '');
        $account_bank = $request->get('account_bank', '');
        $user = \Auth::user();
        if($point > $user->point) {
            return redirect('/withdraw-review?_token='.$request->get('_token').'&point='.$point.'&user_bank='.$user_bank.'&name_bank='.$name_bank.'&account_bank='.$account_bank)->with('flash_withdraw_message_warning', 'Bạn không đủ tiền để thực hiện chức năng này!');
        }
        if ( is_numeric($point) && $point >= 50 && $user_bank != '' && $name_bank != '' && is_numeric($account_bank) ) {
            $hasher = app('hash');
            $password = $request->get('password', '');
            if ($password != '') {
                if ($hasher->check($password, $user->password)) {
                    $user->point = $user->point - $point;
                    if($user->save()) {
                        $withdraw = new Withdraw();
                        $withdraw->user_id = $user->id;
                        $withdraw->point = $point;
                        $withdraw->reason = 'Rút tiền hoa hồng!';
                        $withdraw->user_bank = $user_bank;
                        $withdraw->name_bank = $name_bank;
                        $withdraw->account_bank = $account_bank;
                        $withdraw->save();
                        return redirect('/withdraw-success')->with('flash_withdraw_message', "Khớp lệnh thành công!");
                    } else {
                        return redirect('/withdraw-review?_token='.$request->get('_token').'&point='.$point.'&user_bank='.$user_bank.'&name_bank='.$name_bank.'&account_bank='.$account_bank)->with('flash_withdraw_message_warning', 'Đã xảy ra lỗi!');
                    }
                } else {
                    return redirect('/withdraw-review?_token='.$request->get('_token').'&point='.$point.'&user_bank='.$user_bank.'&name_bank='.$name_bank.'&account_bank='.$account_bank)->with('flash_withdraw_message_warning', 'Mật khẩu không chính xác!');
                }
            } else {
                return redirect('/withdraw-review?_token='.$request->get('_token').'&point='.$point.'&user_bank='.$user_bank.'&name_bank='.$name_bank.'&account_bank='.$account_bank)->with('flash_withdraw_message_warning', 'Mật khẩu không được rỗng!');
            }
        } else {
            return redirect('/withdraw-success')->with('warning', 'Đã xảy ra lỗi!');
        }
    }

    public function manageWithdraw() {
        if(!$this->isAdmin()) {
            abort(404);
        }
        $withdraws = Withdraw::all();
        return view('manager_withdraw', compact('withdraws'));
    }

    public function active(Request $request) {
        if(!$this->isAdmin()) {
            abort(404);
        }
        $withdraw = Withdraw::find($request->get('withdraw_id', 0));
        $withdraw->status = 1;
        if($withdraw->save()) {
            return redirect('manager-withdraw')->with('success', 'Lệnh rút tiền ' . $request->get('withdraw_id', 0) . ' chuyển khoản thành công!');
        } else {
            return redirect('manager-withdraw')->with('warning', 'Đã xảy ra lỗi!');
        }
    }

    public function delete($id)
    {
        if(!$this->isAdmin()) {
            abort(404);
        }
        $withdraw = Withdraw::find($id);
        $withdraw->delete();
        return redirect('manager-withdraw')->with('success', 'Lệnh rút tiền ' . $id . ' được xóa thành công!');
    }
}
