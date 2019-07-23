<?php

namespace App\Http\Controllers;

use App\Model\SellerModel;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:seller')->only('index');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * phuong thuc tra ve view khi dang nhap thanh cong
     */
    public function index(){
        return view('seller.dashboard');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * phuong thuc tra ve view dki tk
     */
    public function create(){
        return view('seller.auth.register');
    }
    public function store(Request $request){
        //validate dl dc gui tu form
        $this->validate($request,array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));

        //Khoi tao model de luu admin moi
        $sellerModel = new SellerModel();
        $sellerModel->name = $request->name;
        $sellerModel->email = $request->email;
        $sellerModel->password = bcrypt($request->password);
        $sellerModel->save();

        return redirect()->route('seller.auth.login');
    }
}
