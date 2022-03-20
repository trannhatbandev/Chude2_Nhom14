@extends('layout')
@section('content')

<!--new product area start-->
<div class="new_product_area">
                                    <div class="block_title">
                                            <h3>Sản phẩm mới</h3>
                                        </div>
                                        <div class="row">
                                            <div class="product_active owl-carousel">
                                                @foreach($sanphammoi as $key=>$value1)
                                                <div class="col-lg-3">
                                                    <form action="{{URL::to('/save-cart')}}" method="POST">
                                                        {{@csrf_field()}}
                                                        <input name="qty" type="hidden"  min="1" value="1" >
                                                        <input name="productid_hidden" type="hidden" value="{{$value1->product_id}}" >
                                                        <div class="single_product">
                                                           
                                                            <div class="product_thumb">
                                                                 <a href="{{url('san-pham/'.$value1->product_slug)}}"><img src="{{asset('public/uploads/product/'.$value1->product_image)}}" alt=""></a> 
                                                                <div class="img_icone">
                                                                    <img src="{{asset('public/frontend/img/cart/span-new.png')}}" alt="">
                                                                </div>
                                                                <div class="product_action">
                                                                    <form action="{{URL::to('/save-cart')}}" method="POST">
                                                                        {{@csrf_field()}}
                                                                        <input name="qty" type="hidden"  min="1" value="1" >
                                                                        <input name="productid_hidden" type="hidden" value="{{$value1->product_id}}" >
                                                                        <button type="submit" class="btn btn-primary cart">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                            Thêm vào giỏ hàng
                                                                        </button>
                                                                    </form>   
                                                                </div>
                                                            </div>
                                                                <div class="product_content">
                                                                    <h3 class="product_title"><a href="{{url('san-pham/'.$value1->product_slug)}}">{{$value1->product_name}}</a></h3>
                                                                    <span class="product_price">{{number_format($value1->product_price)}} VND</span>
                                                                </div>
                                                                <div class="product_info">
                                                                    <ul>
            
                                                                        <li><a href="{{url('san-pham/'.$value1->product_slug)}}" >Xem chi tiết</a></li>
                                                                    </ul>
                                                                </div>
                                                           
                                                        </div>  
                                                                  
                                                </div>
                                                @endforeach
                                              
                                            </div> 
                                        </div>       
                                    </div> 
                                    <!--new product area start--> 

                                     <!--featured product start--> 
                                     <div class="featured_product">
                                        <div class="block_title">
                                            <h3>Sản phẩm nổi bật</h3>
                                        </div>
                                        <div class="row">
                                            <div class="product_active owl-carousel">
                                                @foreach($sanphamnoibat as $key =>$value)
                                                <div class="col-lg-3">
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                           <a href="{{url('san-pham/'.$value->product_slug)}}"><img src="{{asset('public/uploads/product/'.$value->product_image)}}" alt=""></a> 
                                                           <div class="hot_img">
                                                               <img src="{{asset('public/frontend/img/cart/span-hot.png')}}" alt="">
                                                           </div>
                                                           <div class="product_action">
                                                               
                                                            <form action="{{URL::to('/save-cart')}}" method="POST">
                                                                {{@csrf_field()}}
                                                                <input name="qty" type="hidden"  min="1" value="1" >
                                                                <input name="productid_hidden" type="hidden" value="{{$value->product_id}}" >
                                                                <button type="submit" class="btn btn-primary cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    Thêm vào giỏ hàng
                                                                </button>
                                                            </form>   
                                                           </div>
                                                        </div>
                                                        <div class="product_content">
                                                            <h3 class="product_title"><a href="{{url('san-pham/'.$value->product_slug)}}">{{$value->product_name}}</a></h3>
                                                            <span class="product_price">{{number_format($value->product_price)}} VND</span>
                                                        </div>
                                                        <div class="product_info">
                                                            <ul>
                                                                
                                                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">Xem chi tiết</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div> 
                                        </div> 
                                    </div>     
                                    <!--featured product end-->  
@endsection
