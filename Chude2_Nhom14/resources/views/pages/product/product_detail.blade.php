@extends('layout')
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Chi tiết sản phẩm</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

  
     <!--product wrapper start-->
    <div class="product_details">
        <div class="row">
            
                <div class="col-lg-5 col-md-6">
                    <div class="product_tab fix"> 
                        <div class="tab-content produc_tab_c">
                            <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                                <div class="modal_img">
                                    <a href="#"><img src="{{asset('public/uploads/product/'.$sanpham_detail->product_image)}}" alt=""></a>
                                    <div class="view_img">
                                        <a class="large_view" href="assets/img/product/product13.jpg"><i class="fa fa-search-plus"></i></a>
                                    </div>    
                                </div>
                            </div>
                        </div>

                    </div> 
                </div>
                
                <div class="col-lg-7 col-md-6">
                    <div class="product_d_right">
                        <h1>{{$sanpham_detail->product_name}}</h1>
                         <div class="product_ratting mb-10">
                           
                        </div>
                        <div class="product_desc">
                            <p>{{$sanpham_detail->product_description}}</p>
                        </div>

                        <div class="content_price mb-15">
                            <span>{{$sanpham_detail->product_price}}</span>
                        </div>
                        <div class="box_quantity mb-20">
                            <form action="{{URL::to('/save-cart')}}" method="POST">
                                {{@csrf_field()}}
                                <label>Số lượng</label>
                                <input name="qty" type="number" min="1" value="1" >
                                <input name="productid_hidden" type="hidden" value="{{$sanpham_detail->product_id}}" >
                                <button type="submit" class="btn btn-primary cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Thêm vào giỏ hàng
                                </button>
                            </form>   
                              
                        </div>
                        <div class="product_d_size mb-20">
                            <label for="group_1">size</label>
                            <select name="size" id="group_1">
                                @foreach($size as $key => $value)
                                    <option value="{{$value->size_id}}">{{$value->size_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                            <div class="sidebar_widget color">
                                <h2>Lựa chọn màu:</h2>
                                <select name="color" id="group_1">
                                    @foreach($mausac as $key => $value)
                                        <option value="{{$value->color_id}}">{{$value->color_name}}</option> <br>
                                    @endforeach
                                </select>
                            </div>                 

                    </div>
                </div>
            </div>
    </div>
    <!--product details end-->


    <!--product info start-->
    <div class="product_d_info">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">   
                    <div class="product_info_button">    
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Thông tin thêm</a>
                            </li>
                            <li>
                                 <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Thống kê</a>
                            </li>
                            <li>
                               <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Nhận xét</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p></p>
                            </div>    
                        </div>

                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_d_table">
                               <form action="#">
                                    <table>
                                        <tbody>
                                           
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="product_info_content">
                                <p></p>
                            </div>    
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="product_info_content">
                                <p></p>
                            </div>
                            <div class="product_info_inner">
                              
                               
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>  
    <!--product info end-->
   
@endsection
