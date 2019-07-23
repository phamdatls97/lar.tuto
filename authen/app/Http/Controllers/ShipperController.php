<?php

namespace App\Http\Controllers;

use App\Model\ShipperModel;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:shipper')->only('index');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * phuong thuc tra ve view khi dang nhap thanh cong
     */
    public function index(){
        return view('shipper.dashboard');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * phuong thuc tra ve view dki tk
     */
    public function create(){
        return view('shipper.auth.register');
    }
    public function store(Request $request){
        //validate dl dc gui tu form
        $this->validate($request,array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));

        //Khoi tao model de luu admin moi
        $shipperModel = new ShipperModel();
        $shipperModel->name = $request->name;
        $shipperModel->email = $request->email;
        $shipperModel->password = bcrypt($request->password);
        $shipperModel->save();

        return redirect()->route('shipper.auth.login');
    }
}
