@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật màu sắc sản phẩm 
                        </header>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post" action="{{route('mausac.update',[$mausac->color_id])}}">
                                    @method('PUT')
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên màu</label>
                                    <input type="text" name="color_name" value="{{$mausac->color_name}}" class="form-control" placeholder="Tên màu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã màu</label>
                                    <input type="text" name="color_code" value="{{$mausac->color_code}}" class="form-control" placeholder="Mã màu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái</label>
                                    <select class="form-control input-lg m-bot15" name="color_status">
                                        @if($mausac->color_status==1)
                                            <option selected value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="1">Hiển thị</option>
                                            <option  selected value="0">Ẩn</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" name="update_color" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection