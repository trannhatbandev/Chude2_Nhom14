@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Liệt kê thương hiệu sản phẩm
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
            <th>Tên thương hiệu</th>
            <th>Slug thương hiệu</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($thuonghieu as $key => $value)
          <tr> 
            
            <td>{{$value->brand_name}}</td>
            <td>{{$value->brand_slug}}</td>
            <td><span class="text-ellipsis">{{$value->brand_description}}</span></td>
            <td>
              <span class="text-ellipsis">
                @if($value->brand_status==1)
                  <a href="{{url('update-brand-status-an/'.$value->brand_id)}}"><span class="text text-success">Hiển thị</span></a>
                @else
                  <a href="{{url('update-brand-status-hienthi/'.$value->brand_id)}}"><span class="text text-danger">Ẩn</span></a>
                @endif
              </span>
            </td>
            <td>
                <a href="{{route('thuonghieu.edit',[$value->brand_id])}}"><button class="btn btn-success" >Cập nhật</button></a>
                <form action="{{route('thuonghieu.destroy',[$value->brand_id])}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" style="margin-top:10px" onclick="return confirm('Bạn muốn xóa thương hiệu sản phẩm này không?');">Xóa</button>
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