<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Controllers\AdminController as Controller;
use App\Models\Order;
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


        $user = \Auth::user();
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
        return view('profile', compact('histories', 'packageQuantity', 'affiliateSum', 'packageSumBonus', 'trees', 'user'));
    }
}
