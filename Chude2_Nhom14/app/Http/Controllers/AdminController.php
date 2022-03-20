<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {
        return view('admincp.dashboard');
    }
    public function adminLogin(Request $request)
    {
        $data = $request->validate([
            'admin_username' => 'required|max:255',
            'admin_password' => 'required|min:6|max:255',
        ],
        [
            'admin_username.required' => 'Username bạn phải điền!',
            'admin_password.required' => 'Password bạn phải điền!',
            'admin_password.min' => 'Mật khẩu phải lớn hơn hoặc bằng 6 kí tự',
        ]
    );

        $username= $data['admin_username'];
        $pass= md5($data['admin_password']);
        $admin= Admin::where('admin_username',$username)->where('admin_password',$pass)->first();
        if($admin){
         
            Session::put('admin_name',$admin->admin_name );
            Session::put('admin_id',$admin->admin_id );
            return view('admincp.dashboard');
        }else{
            return redirect()->back()->with('login_admin','Bạn đăng nhập không thành công.Xin vui lòng xem lại username và mật khẩu của bạn!^^');;
        }
    }
    public function logOut()
    {
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
