@extends('layout')
@section('content')

<div class="new_product_area">
                                    <div class="block_title text-center">
                                            <h3>{{$danhmuc_id->category_name}}</h3>
                                        </div>
                                       
                                        <div class="row">
                                            @foreach($sanpham as $key => $value)
                                                <div class="col-lg-3">
                                                   
                                                    <div class="single_product">
                                                      
                                                        <div class="product_thumb">
                                                           <a href="{{url('san-pham/'.$value->product_slug)}}"><img src="{{asset('public/uploads/product/'.$value->product_image)}}" alt=""></a> 
                                                           <div class="img_icone">
                                                               <img src="{{asset('public/frontend/img/cart/span-new.png')}}" alt="">
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
                                                                
                                                                <li><a href="{{url('san-pham/'.$value->product_slug)}}">Xem chi tiết</a></li>
                                                            </ul>
                                                        </div>
                                                        
                                                    </div>
                                                     
                                                   
                                                </div>
                                                @endforeach
                                        </div>    
                                          
                                    </div>                                          
                                    
@endsection
