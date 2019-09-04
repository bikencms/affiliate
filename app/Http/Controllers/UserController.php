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
        return view('manager_user', compact('users'));
    }

    public function delete($id = 0) {
        if(!$this->isAdmin()) {
            return abort(404);
        }
        $user = User::find($id);
        $user->orders()->delete();
        $user->histories()->delete();
        $user->delete();
        return redirect('user')->with('success', 'User ' . $id . ' has been  deleted successfully!');
    }

    public function showTree($id)
    {
        if(!$this->isAdmin()) {
            return abort(404);
        }
        $user = User::find($id);
        $trees = [];
        if( $user != '' ) {
            $parent = $this->getParent($user);
            if( $parent != '' ) {
                $parent2 = $this->getParent($parent);
                if( $parent2 != '' ) {
                    $parent3 = $this->getParent($parent2);
                    if( $parent3 != '' ) {
                        array_push($trees, $parent3);
                        array_push($trees, $parent2);
                        array_push($trees, $parent);
                        array_push($trees, $user);
                    } else {
                        array_push($trees, $parent2);
                        array_push($trees, $parent);
                        array_push($trees, $user);
                    }
                } else {
                    array_push($trees, $parent);
                    array_push($trees, $user);
                }
            } else {
                array_push($trees, $user);
            }
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
        return view('user_show_tree', compact('trees', 'user'));
    }
}
