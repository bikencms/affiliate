<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
class PackageController extends AdminController
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
            'name' => 'required|string|max:50',
            'price' => 'required|int'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $packageFree = Package::where('price', 0)->get();
        $packageFee = Package::where('price', '>', 0)->get();
        return view('package', compact('packageFree', 'packageFee'));
    }

    public function addPackage(Request $request) {
        $idPackpage = $request->query('id_package');
        $idUser = \Auth::user()->id;
        $order =  new Order();
        $order->id_user = $idUser;
        $order->id_package = $idPackpage;

        if($order->save()) {
            session()->flash('flash_order_message', 1);
            session()->flash('flash_order_id', $order->id);
            session()->flash('flash_package', $order->package);
            return redirect('/package_success');
        } else {
            die('Something went wrong.');
        }
    }

    public function manager() {
        if(!$this->isAdmin()) {
            abort(404);
        }
        $packages = Package::all();
        return view('manager_package', compact('packages'));
    }

    public function create(Request $request) {
        if(!$this->isAdmin()) {
            abort(404);
        }
        $this->validator($request->all())->validate();
        $name = $request->get('name','');
        $price = $request->get('price', 0);
        $description = $request->get('description', '');

        if($name != '' && is_numeric($price) ) {
            $package = new Package();
            $package->name = $name;
            $package->price = $price;
            $package->description = $description;
            if ($package->save()) {
                return redirect('/package/manager')->with('success', "Package $name is added successfully!");
            } else {
                return redirect('/package/manager')->with('warning', 'Something went wrong');
            }
        }
    }

    public function delete(Request $request) {
        if(!$this->isAdmin()) {
            abort(404);
        }
        $id = $request->get('id', 0);
        if($id > 0) {
            $package = Package::find($id);
            if ($package->delete()) {
                return redirect('/package/manager')->with('success', "Package $package->name is deleted successfully!");
            } else {
                return redirect('/package/manager')->with('warning', 'Something went wrong');
            }
        }
    }

    public function edit($id = 0) {
        if($id > 0) {
            $package = Package::find($id);
            return view('manager_package_edit', compact('package'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id = 0) {
        if(!$this->isAdmin()) {
            abort(404);
        }
        if($id == 0) {
            abort(404);
        }

        $this->validator($request->all())->validate();
        $name = $request->get('name','');
        $price = $request->get('price', 0);
        $description = $request->get('description', '');

        if($name != '' && is_numeric($price) ) {
            $package = Package::find($id);
            $package->name = $name;
            $package->price = $price;
            $package->description = $description;
            if ($package->save()) {
                return redirect('/package/manager')->with('success', "Package $name is edited successfully!");
            } else {
                return redirect('/package/manager')->with('warning', 'Something went wrong');
            }
        }
    }
}
