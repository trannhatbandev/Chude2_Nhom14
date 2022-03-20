@extends('layout')
@section('content')  
   <!--breadcrumbs area start--> 
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('/')}}">Trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Liên hệ</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--contact area start-->
    <div class="contact_area">
        <div class="row">
            
              
               <div class="col-lg-12 col-md-6">
                   <div class="contact_message contact_info">
                        <h3>Liên hệ với chúng tôi</h3>    
                         <p></p>
                        <ul>
                            <li><i class="fa fa-fax"></i>  Địa chỉ : 180 Cao lỗ, phường 4, quận 8</li>
                            <li><i class="fa fa-phone"></i> <a href="#">nhom14@gmail.com</a></li>
                            <li><i class="fa fa-envelope-o"></i>0978119953</li>
                        </ul>             
                    </div> 
               </div>
           </div>
    </div>

    <!--contact area end-->
    @endsection