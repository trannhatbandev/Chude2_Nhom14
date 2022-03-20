@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật size sản phẩm 
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
                                <form role="form" method="post" action="{{route('size.update',[$size->size_id])}}">
                                    @method('PUT')
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên size</label>
                                    <input type="text" name="size_name" value="{{$size->size_name}}" class="form-control" placeholder="Tên size">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize:none" rows="8" class="form-control" value="{{$size->size_description}}" name="size_desc" >{{$size->size_description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái</label>
                                    <select class="form-control input-lg m-bot15" name="size_status">
                                        @if($size->size_status==1)
                                            <option selected value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="1">Hiển thị</option>
                                            <option  selected value="0">Ẩn</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" name="update_size" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection