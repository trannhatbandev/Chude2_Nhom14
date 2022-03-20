<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\DanhMucSanPham;
use App\Models\ThuongHieu;
use App\Models\SanPham;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerController extends Controller
{
    public function customerRegister(Request $request)
    {
        $data = $request->validate(
            [
            'customer_name' => 'required|max:255',
            'customer_password' => 'required|max:255',
            'customer_email' => 'required||unique:tbl_customer|max:255',
            'customer_phone' => 'required|min:10',
            'customer_address' => 'required',
            ],
            [
                'customer_email.unique' => 'Email đã có xin điền email khác',
                'customer_name.required' => 'Tên của bạn phải có',
                'customer_password.required' => 'Password phải có',
                'customer_phone.required' => 'Số điện thoại phải có',
                'customer_address.required' => 'Địa chỉ phải có',
                
            ]
        );
        $khachhang = new Customer();

        $khachhang->customer_name = $data['customer_name'];
        $khachhang->customer_password = md5($data['customer_password']);
        $khachhang->customer_email = $data['customer_email'];
        $khachhang->customer_phone = $data['customer_phone'];
        $khachhang->customer_address = $data['customer_address'];
       
        $khachhang->save();
        Session::put('customer_name',$khachhang->customer_name );
        Session::put('customer_id',$khachhang->customer_id );
        return Redirect::to('/');;
    }
    public function customerLogin(Request $request){
        $danhmuc = DanhMucSanPham::orderBy('category_id','DESC')->get();
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->get();
        $sanphammoi = SanPham::orderBy('product_id','DESC')->take(10)->get();
        $sanphamnoibat = SanPham::all()->random(3);
        $data = $request->validate([
            'customer_email' => 'required|max:255',
            'customer_password' => 'required|max:255',
        ]);
        $email= $data['customer_email'];
        $pass= md5($data['customer_password']);
        $customer= Customer::where('customer_email',$email)->where('customer_password',$pass)->first();
        if($customer){
            Session::put('customer_name',$customer->customer_name );
            Session::put('customer_id',$customer->customer_id );
            return view('pages.home')->with(compact('danhmuc','sanphammoi','sanphamnoibat','thuonghieu'))->with('login','Bạn đăng nhập thành công!');
        }else{
            return redirect()->back()->with('login','Bạn đăng nhập không thành công!'); ;
        }

    }
    public function customerLogout()
    {
    
        Session::put('customer_name',null);
        Session::put('customer_id',null);
        return Redirect::to('/');
    }

}
