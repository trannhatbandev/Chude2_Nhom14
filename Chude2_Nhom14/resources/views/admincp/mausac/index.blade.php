@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Liệt kê màu sắc sản phẩm
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
            <th>Tên màu sắc</th>
            <th>Mã màu</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($mausac as $key => $value)
          <tr> 
            
            <td>{{$value->color_name}}</td>
            <td>{{$value->color_code}}</td>
            <td>
              <span class="text-ellipsis">
                @if($value->color_status==1)
                  <a href="{{url('update-color-status-an/'.$value->color_id)}}"><span class="text text-success">Hiển thị</span></a>
                @else
                  <a href="{{url('update-color-status-hienthi/'.$value->color_id)}}"><span class="text text-danger">Ẩn</span></a>
                @endif
              </span>
            </td>
            <td>
                <a href="{{route('mausac.edit',[$value->color_id])}}"><button class="btn btn-success" >Cập nhật</button></a>
                <form action="{{route('mausac.destroy',[$value->color_id])}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" style="margin-top:10px" onclick="return confirm('Bạn muốn xóa màu sản phẩm này không?');">Xóa</button>
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