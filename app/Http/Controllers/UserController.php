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
        foreach ($users as $key => $user) {
            $user->referral_tree = [];
            if( $this->getParent($user) != '' ) {
                $data = $this->getParent($user);
                if($data != '') {
                    $data1 = $this->getParent($data);
                    if( $data1 != '') {

                    } else {
                        $result = [];
                        array_push($result, $data1);
                        array_push($result, $data);
                        $user->referral_tree = $result;
                    }
                } else {
                    $user->referral_tree = $this->showTree($this->getParent($user));
                }
            } else {
                $user->referral_tree = $this->showTree($user);
            }
        }

        return view('manager_user', compact('users'));
    }

    public function delete($id = 0) {
        $user = User::find($id);
        $user->orders()->delete();
        $user->histories()->delete();
        $user->delete();
        return redirect('user')->with('success', 'User ' . $id . ' has been  deleted successfully!');
    }

    public function showTree($user)
    {
        $result = [
            "id" =>  $user->email,
            "parent" => $user->email_referral,
            "text" => (array)$user->email,
        ];
        return $result;
    }

    public function getParent($user) {
        $data = User::where('email', '=', $user->email_referral)->first();
        return $data;
    }
}
