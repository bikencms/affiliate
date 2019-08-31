<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\AdminController as Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        $users = DB::table("users")->select('*')
            ->whereNOTIn('id',function($query){
                $query->select('user_id')->from('role_users');
            })
            ->get();
//        foreach ($users as $key => $user) {
//            $user->referral_tree = $this->showTree($users, $user->email_referral);
//        }

        return view('manager_user', compact('users'));
    }

    public function delete($id = 0) {
        $user = User::find($id);
        $user->orders()->delete();
        $user->histories()->delete();
        $user->delete();
        return redirect('user')->with('success', 'User ' . $id . ' has been  deleted successfully!');
    }

    public function showTree($users, $email_referral = '')
    {
        $data = [];
        foreach ($users as $key => $user) {
            if ($user->email == $email_referral) {
                $result = [
                    "id" =>  $user->email,
                    "parent" => $user->email_referral,
                    "text" => (array)$user->email,
                ];
                array_push($data, $result);
                $this->showTree($users, $user->email_referral);
            }
        }
        return $data;
    }
}
