<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Nhóm 14</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/img/favicon.png')}}">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/plugin.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/bundle.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">
        <script src="{{asset('public/frontend/js/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
            
            <!--pos page start-->
            <div class="pos_page">
                <div class="container">
                   <!--pos page inner-->
                    <div class="pos_page_inner">  
                       <!--header area -->
                        <div class="header_area">
                               <!--header top--> 
                                <div class="header_top">
                                   <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6">
                                           <div class="switcher">
                                              
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="header_links">
                                                <ul>
                                                    <?php
                                                        $customer_name = Session::get('customer_name');
                                                        $userId = Session::get('customer_id');
                                                    ?>
                                                    <li><a href="cart.html" title="">
                                                        Xin chào! <?php echo $customer_name ?> 
                                                    </a></li>
                                                    @if($userId)
                                                        <li><a href="{{url('show-cart')}}" title="My cart">Giỏ hàng</a></li>
                                                    @else
                                                        <li><a href="{{url('show-cart')}}" title="My cart">Giỏ hàng</a></li>
                                                    @endif
                                                    
                                                    @if($customer_name)
                                                        <li><a href="{{url('dang-xuat')}}" title="Logout">Đăng xuất</a></li>
                                                    @else
                                                        <li><a href="{{url('show-dang-nhap')}}" title="Login">Đăng nhập</a></li>
                                                        <li><a href="{{url('show-dang-ky')}}" title="Register">Đăng ký</a></li>
                                                    @endif
                                                    
                                                </ul>
                                            </div>   
                                        </div>
                                   </div> 
                                </div> 
                                <!--header top end-->

                                <!--header middel--> 
                                <div class="header_middel">
                                    <div class="row align-items-center">
                                       <!--logo start-->
                                        <div class="col-lg-3 col-md-3">
                                            <div class="logo">
                                                <a href="{{url('/')}}"><img src="{{asset('public/frontend/img/logo/nhom14.jpg')}}" style="width: 100px" alt=""></a>
                                            </div>
                                        </div>
                                        <!--logo end-->
                                        <div class="col-lg-9 col-md-9">
                                            <div class="header_right_info">
                                                <div class="search_bar">
                                                    <form action="{{url('search-product')}}" method="post">
                                                        @csrf
                                                        <input name="search_keyword" placeholder="Tìm kiếm..." type="text">
                                                        <button type="submit" name="search"><i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>
                                               

                                            </div>
                                        </div>
                                    </div>
                                </div>     
                                <!--header middel end-->      
                            <div class="header_bottom">
                                <div class="row">
                                        <div class="col-12">
                                            <div class="main_menu_inner">
                                                <div class="main_menu d-none d-lg-block">
                                                    <nav>
                                                        <ul>
                                                            <li class="active"><a href="{{URL::to('/trang-chu')}}">Trang chủ</a>
                                                            </li>
                                                            @foreach($danhmuc as $key => $value)
                                                                @if($value->category_parent==0)
                                                                    <li><a href="#">{{$value->category_name}}</a>
                                                                        <div class="mega_menu">
                                                                            <div class="mega_top fix">
                                                                                <div class="mega_items">
                                                                                    <ul>   
                                                                                        @foreach($danhmuc as $key => $danhmuccon)
                                                                                            @if($danhmuccon->category_parent==$value->category_id)
                                                                                                <li><a href="{{url('danh-muc-con/'.$danhmuccon->category_slug)}}">{{$danhmuccon->category_name}}</a></li>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                            <li><a href="{{url('lien-he')}}">Liên hệ</a></li>

                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="mobile-menu d-lg-none">
                                                    <nav>
                                                        <ul>
                                                            <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a>
                                                            </li>
                                                            <li><a href="#">Nam</a>
                                                                <div>
                                                                    <div>
                                                                        <ul>
                                                                            <li><a href="#">Quần jean nam</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>  
                                                            </li>
                                                            <li><a href="{{url('lien-he')}}">Liên hệ</a></li>

                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!--header end -->
                      
                        <!--pos home section-->
                        <div class=" pos_home_section">
                            <div class="row pos_home">
                                <div class="col-lg-3 col-md-8 col-12">
                                   <!--sidebar banner-->
                                    <div class="sidebar_widget banner mb-35">
                                        <div class="banner_img mb-35">
                                            <a href="#"><img src="{{asset('public/frontend/img/banner/banner5.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="banner_img">
                                            <a href="#"><img src="{{asset('public/frontend/img/banner/banner6.jpg')}}" alt=""></a>
                                        </div>
                                    </div>
                                    <!--sidebar banner end-->
                                    <!--brand menu start-->
                                     <div class="sidebar_widget catrgorie mb-35">
                                        <h3>Thương hiệu</h3>
                                        <ul>
                                            @foreach($thuonghieu as $key => $value)
                                            <a href="{{url::to('thuong-hieu/'.$value->brand_slug)}}"><li style="color:white">{{$value->brand_name}}</li></a>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!--brand menu end-->

                                   

                           

                                  

                                    <!--sidebar banner-->
                                    <div class="sidebar_widget bottom ">
                                        <div class="banner_img">
                                            <a href="#"><img src="{{asset('public/frontend/img/banner/banner9.jpg')}}" alt=""></a>
                                        </div>
                                    </div>
                                    <!--sidebar banner end-->



                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <!--banner slider start-->
                                    <div class="banner_slider slider_1">
                                        <div class="slider_active owl-carousel">
                                            <div class="single_slider" style="background-image: url({{asset('public/frontend/img/slider/slider_2.png')}}">
                                                <div class="slider_content">
                                                    <div class="slider_content_inner">  
                                                        <h1>Bộ sưu tập mới</h1>
                                                        <p>Bộ sưu tập mới toang đến từ website của chúng tôi! Hãy trải nghiệm </p>
                                                        <a href="#">Mua ngay</a>
                                                    </div>         
                                                </div>         
                                            </div>
                                            <div class="single_slider" style="background-image: url({{asset('public/frontend/img/slider/slide_1.png')}}">
                                                <div class="slider_content">
                                                    <div class="slider_content_inner">  
                                                        <h1>Thời trang nữ</h1>
                                                        <p>Mang đến đẳng cấp mới dành cho phái đẹp </p>
                                                        <a href="#">Mua ngay</a>
                                                    </div>     
                                                </div>    
                                            </div>                                          
                                            <div class="single_slider" style="background-image: url({{asset('public/frontend/img/slider/slider_3.png')}}">
                                                <div class="slider_content">  
                                                    <div class="slider_content_inner">  
                                                        <h1>Bộ sưu tập tốt nhất</h1>
                                                        <p>Những bộ sưu tập mới nhất </p>
                                                        <a href="#">Mua ngay</a>
                                                    </div> 
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                                    <!--banner slider start-->
                                    @yield('content')
                                    <!--banner area start-->
                                    <div class="banner_area mb-60">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single_banner">
                                                    <a href="#"><img src="{{asset('public/frontend/img/banner/banner7.jpg')}}" alt=""></a>
                                                    <div class="banner_title">
                                                        <p>Lên đến <span> 40%</span> off</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single_banner">
                                                    <a href="#"><img src="{{asset('public/frontend/img/banner/banner8.jpg')}}" alt=""></a>
                                                    <div class="banner_title title_2">
                                                        <p>khuyến mãi off <span> 30%</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>     
                                    <!--banner area end--> 

                                    <!--brand logo strat--> 
                                    <div class="brand_logo mb-60">
                                        <div class="block_title">
                                            <h3>Thương hiệu</h3>
                                        </div>
                                        <div class="row">
                                            <div class="brand_active owl-carousel">
                                                <div class="col-lg-2">
                                                    <div class="single_brand">
                                                        <a href="#"><img src="{{asset('public/frontend/img/brand/puma.jpg')}}" style="max-width: 150px" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="single_brand">
                                                        <a href="#"><img src="{{asset('public/frontend/img/brand/gucci.jpg')}}" style="max-width: 80px" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="single_brand">
                                                        <a href="#"><img src="{{asset('public/frontend/img/brand/adidas.jpg')}}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="single_brand">
                                                        <a href="#"><img src="{{asset('public/frontend/img/brand/paris.jpg')}}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="single_brand">
                                                        <a href="#"><img src="{{asset('public/frontend/img/brand/sainlaurebt.jpg')}}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="single_brand">
                                                        <a href="#"><img src="{{asset('public/frontend/img/brand/victorymen.jpg')}}" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>       
                                    <!--brand logo end-->        
                                </div>
                            </div>  
                        </div>
                        <!--pos home section end-->
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
            
            <!--footer area start-->
            <div class="footer_area">
                <div class="footer_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Liên hệ chúng tôi</h3>
                                    <p></p>
                                    <div class="footer_widget_contect">
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>180 Cao lỗ, Phường 5, Quận 8, TP.HCM</p>

                                        <p><i class="fa fa-mobile" aria-hidden="true"></i> 0978119953</p>
                                        <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> nhom14@gmail.com </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Tài khoản của tôi</h3>
                                    <ul>
                                        <li><a href="#">Tài khoản của tôi</a></li>
                                        <li><a href="#">Đơn hàng của tôi</a></li>
                                        <li><a href="#">Địa chỉ của tôi</a></li>
                                        <li><a href="#">Đăng nhập</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Thông tin</h3>
                                    <ul>
                                        <li><a href="#">Đặc biệt</a></li>
                                        <li><a href="#">Cửa hàng của tôi</a></li>
                                        <li><a href="#">Điều khoản và dịch vụ</a></li>
                                        <li><a href="#">Về chúng tôi</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Tính năng bổ sung</h3>
                                    <ul>
                                        <li><a href="#"> Thương hiệu</a></li>
                                        <li><a href="#"> Khuyến mãi </a></li>
                                        <li><a href="#"> Đặc biệt </a></li>
                                        <li><a href="#"> Điều khoản dịch vụ </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright_area">
                                    <ul>
                                        <li><a href="#"> Liên hệ chúng tôi </a></li>
                                        <li><a href="#">  Dịch vụ khách hàng  </a></li>
                                        <li><a href="#">  Điều khoản dịch vụ  </a></li>
                                    </ul>
                                    <p>Copyright &copy; 2022 <a href="#"></a>. Tất cả quyền. </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="footer_social text-right">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer area end-->

		
		<!-- all js here -->
        <script src="{{asset('public/frontend/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/popper.js')}}"></script>
        <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/ajax-mail.js')}}"></script>
        <script src="{{asset('public/frontend/js/plugins.js')}}"></script>
        <script src="{{asset('public/frontend/js/main.js')}}"></script>
        <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
        
      
    </body>
</html>
