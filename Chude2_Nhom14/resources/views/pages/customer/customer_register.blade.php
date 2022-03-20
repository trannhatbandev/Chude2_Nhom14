@extends('layout')
@section('content')
 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
                            <div class="row">
                                    <div class="col-12">
                                        <div class="breadcrumb_content">
                                            <ul>
                                                <li><a href="index.html">Trang chủ</a></li>
                                                <li><i class="fa fa-angle-right"></i></li>
                                                <li>Đăng ký thành viên</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--breadcrumbs area end-->

                       <!-- customer login start -->
                        <div class="customer_login">
                            <div class="row">
                                        <!--register area start-->
                                        <div class="col-lg-6 col-md-6">
                                            <div class="account_form register">
                                                <h2>Đăng ký làm thành viên</h2>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                @if (session('register'))
                                                    <div class="alert alert-success">
                                                        {{ session('register') }}
                                                    </div>
                                                @endif
                                                <form action="{{url('khach-hang-dang-ky')}}" method="post">
                                                    @csrf
                                                        <label>Tên<span>*</span></label>
                                                        <input name="customer_name" type="text">
                                                     </p>
                                                     <p>   
                                                        <label>Mật khẩu <span>*</span></label>
                                                        <input  name="customer_password" type="password">
                                                     </p>
                                                    <p>   
                                                        <label>Email <span>*</span></label>
                                                        <input  name="customer_email" type="text">
                                                     </p>
                                                     <p>   
                                                        <label>Số điện thoại <span>*</span></label>
                                                        <input  name="customer_phone" type="text">
                                                     </p>
                                                     <p>   
                                                        <label>Địa chỉ<span>*</span></label>
                                                        <input name="customer_address" type="text">
                                                     </p>
                                                    <div class="login_submit">
                                                        <button name="customer_register" type="submit">Đăng ký</button>
                                                    </div>
                                                </form>
                                            </div>    
                                        </div>
                                        <!--register area end-->
                                    </div>
                        </div>
                        <!-- customer login end -->
@endsection