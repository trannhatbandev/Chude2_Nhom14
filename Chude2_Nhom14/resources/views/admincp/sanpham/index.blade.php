@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Liệt kê sản phẩm
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Tìm kiếm">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên sản phẩm</th>
            <th>Hình ảnh sản phẩm</th>
            <th>Slug sản phẩm</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Danh mục sản phẩm</th>
            <th>Thương hiệu sản phẩm</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($sanpham as $key => $sp)
          <tr> 
            <td>{{$sp->product_name}}</td>
            <td><img src="{{asset('public/uploads/product/'.$sp->product_image)}}" height="150px" width="150px"></td>
            <td>{{$sp->product_slug}}</td>
            <td><span class="text-ellipsis">{{$sp->product_description}}</span></td>
            <td>{{$sp->product_price}}</td>
            <td>{{$sp->danhmucsanpham->category_name}}</td>
            <td>{{$sp->thuonghieu->brand_name}}</td>
            <td>
              <span class="text-ellipsis">
                @if($sp->product_status==1)
                  <a href="{{url('update-product-status-an/'.$sp->product_id)}}"><span class="text text-success">Hiển thị</span></a>
                @else
                  <a href="{{url('update-product-status-hienthi/'.$sp->product_id)}}"><span class="text text-danger">Ẩn</span></a>
                @endif
              </span>
            </td>
            <td>
                <a href="{{route('sanpham.edit',[$sp->product_id])}}"><button class="btn btn-success" >Cập nhật</button></a>
                <form action="{{route('sanpham.destroy',[$sp->product_id])}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" style="margin-top:10px" onclick="return confirm('Bạn muốn xóa sản phẩm này không?');">Xóa</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
   
  </div>
</div>
@endsection