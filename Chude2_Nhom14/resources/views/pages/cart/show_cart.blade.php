<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Giỏ hàng</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <!-- Add your site or application content here -->
            
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
                                                    ?>
                                                    <li><a href="cart.html" title="">
                                                        Xin chào! <?php echo $customer_name ?> 
                                                    </a></li>
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
                                    <div class="col-lg-3 col-md-3">
                                        <div class="logo">
                                            <a href="{{url('/')}}"><img src="{{asset('public/frontend/img/logo/nhom14.jpg')}}" style="width: 100px"></a>
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
                                                            <li><a href="contact.html">Liên hệ</a></li>
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
                         <!--breadcrumbs area start-->
                        <div class="breadcrumbs_area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb_content">
                                        <ul>
                                            <li><a href="{{url('/')}}">Trang chủ</a></li>
                                            <li><i class="fa fa-angle-right"></i></li>
                                            <li>Giỏ hàng</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->



                         <!--shopping cart area start -->
                        <div class="shopping_cart_area">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table_desc">
                                                <div class="cart_page table-responsive">
                                                    <table>
                                                <thead>
                                                    <tr>
                                                        
                                                        <th class="product_thumb">Hình ảnh</th>
                                                        <th class="product_name">Sản phẩm</th>
                                                        <th class="product-price">Giá</th>
                                                        <th class="product_quantity">Số lượng</th>
                                                        <th class="product_update">Cập nhật</th>
                                                        <th class="product_total">Thành tiền</th>
                                                        <th class="product_remove">Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if($userId){
                                                            $content = Cart::session($userId )->getContent();
                                                        }else{
                                                            $content = Cart::getContent();
                                                        }
                                                       ?>
                                                    @foreach($content as $value)
                                                    <tr>
                                                        <td class="product_thumb"><a href="#"><img src="{{asset('public/uploads/product/'.$value->attributes->image)}}" style="width:50px"></a></td>
                                                        <td class="product_name"><a href="#">{{$value->name}}</a></td>
                                                        <td class="product-price">{{number_format($value->price).' '.'vnđ'}}</td>
                                                            <form action="{{url('update-cart')}}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$value->id}}" class="form-control" >
                                                                <input type="hidden" name="rowId" value="{{$value->id}}"> 
                                                                <td class="product_quantity"><input name="qty" type="number" value="{{$value->quantity}}" min="1" class="form-control"></td>
                                                                <td><button type="submit" class="btn btn-default btn-sm" name="update_cart">Cập nhật</button></td>
                                                            </form>
                                                            <td class="product_total">
                                                                <?php
                                                                    $total = $value->price * $value->quantity;
                                                                    echo number_format($total).' '.'vnđ';
                                                                ?>
                                                            </td>
                                                        <td class="product_remove"><a href="{{url('delete-cart/'.$value->id)}}"><i class="fa fa-trash-o"></i></a></td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>   
                                                </div>  
                                            </div>
                                         </div>
                                     </div>
                                    
                                     <!--coupon code area start-->
                                    <div class="coupon_area">
                                        <div class="row">
                                           
                                            <div class="col-lg-10 col-md-12">
                                                <div class="coupon_code">
                                                    <h3>Tổng số</h3>
                                                    <div class="coupon_inner">
                                                       <div class="cart_subtotal">
                                                           <p>Tổng phụ</p>
                                                           <p class="cart_amount">{{number_format(Cart::getSubToTal()).' '.'vnđ'}}</p>
                                                       </div>
                                                       {{-- <div class="cart_subtotal ">
                                                           <p>Phí vận chuyển</p>
                                                           <p class="cart_amount"><span>12000</span> </p>
                                                       </div>
                                                       <a href="#">Phí vận chuyển</a> --}}

                                                       <div class="cart_subtotal">
                                                           <p>Tổng</p>
                                                           <p class="cart_amount">{{number_format(Cart::getSubToTal()).' '.'vnđ'}}</p>
                                                       </div>
                                                       <div class="checkout_btn">
                                                           <a href="#">Tiến hành thanh toán</a>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--coupon code area end-->
                                </form> 
                         </div>
                         <!--shopping cart area end -->

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
