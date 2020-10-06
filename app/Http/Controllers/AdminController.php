<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\UseCoupon;
use Auth;
class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        return view('Admin.index');
    }

    public function coupon(){
        $coupons=Coupon::latest()->get();
        $users=UseCoupon::latest()->get();
        if($coupons == null){
            $coupons="No data";
            $users="No data";
            return view('Admin.Pages.generateToken')->with(['coupons'=>$coupons,'users'=>$users]);
        }
        else{
            return view('Admin.Pages.generateToken')->with(['coupons'=>$coupons,'users'=>$users]);
        }
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'use_number' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);
        $code=$this->generateRandomString();
        $coupon=new Coupon();
        $coupon->coupon=$code;
        $coupon->use_number=$request->use_number;
        $coupon->amount=$request->amount;
        $coupon->date=$this->getDate();
        $coupon->save();
        return redirect()->back()->with('success','Successfully generated coupon');
    }

    function generateRandomString($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getLogOut(){
        Auth::logout();
        return redirect('/login');
    }
}
