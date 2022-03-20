@extends('layout')
@section('content')
 <!--breadcrumbs area start-->
                        <div class="breadcrumbs_area ">
                            <div class="row">
                                    <div class="col-12">
                                        <div class="breadcrumb_content">
                                            <ul>
                                                <li><a href="index.html">Trang chủ</a></li>
                                                <li><i class="fa fa-angle-right"></i></li>
                                                <li>Đăng nhập</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--breadcrumbs area end-->

                       <!-- customer login start -->
                        <div class="customer_login mr-auto">
                            <div class="row">
                                       <!--login area start-->
                                        <div class="col-lg-6 col-md-6">
                                            <div class="account_form">
                                                <h2>Đăng nhập</h2>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                @if (session('login'))
                                                    <div class="alert alert-success">
                                                        {{ session('login') }}
                                                    </div>
                                                @endif
                                                <form action="{{url('khach-hang-dang-nhap')}}" method="post">
                                                    @csrf
                                                    <p>   
                                                        <label> email <span>*</span></label>
                                                        <input name="customer_email" type="text">
                                                     </p>
                                                     <p>   
                                                        <label>Mật khẩu <span>*</span></label>
                                                        <input name="customer_password" type="password">
                                                     </p>   
                                                    <div class="login_submit">
                                                        <button type="submit">Đăng nhập</button>
                                                        <label for="remember">
                                                            <input id="remember" type="checkbox">
                                                            Nhớ mật khẩu
                                                        </label>
                                                        <a href="#">Quên mật khẩu?</a>
                                                    </div>

                                                </form>
                                             </div>    
                                        </div>
                                        <!--login area start-->

                             </div>
                        </div>
                        <!-- customer login end -->
@endsection