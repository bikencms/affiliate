<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Order;
class PackageController extends Controller
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
        $packages = Package::all();
        return view('package', compact('packages'));
    }

    public function addPackage(Request $request) {
        $idPackpage = $request->query('id_package');
        $idUser = \Auth::user()->id;
        $order =  new Order();
        $order->id_user = $idUser;
        $order->id_package = $idPackpage;

        if($order->save()) {
            echo '<script>localStorage.clear();</script>';
            session()->flash('flash_order_message', 1);
            return redirect('/package_success');
        } else {
            die('Something went wrong.');
        }
    }
}
