@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thương hiệu sản phẩm 
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
                                <form role="form" method="post" action="{{route('thuonghieu.update',[$thuonghieu->brand_id])}}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiêu</label>
                                    <input type="text" name="brand_name" id="slug" onkeyup="ChangeToSlug();" value="{{$thuonghieu->brand_name}}" class="form-control" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug thương hiệu</label>
                                    <input type="text" name="brand_slug" id="convert_slug" value="{{$thuonghieu->brand_slug}}" class="form-control" placeholder="Slug thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize:none" rows="8" class="form-control" value="{{$thuonghieu->brand_description}}" name="brand_desc" >{{$thuonghieu->brand_description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái</label>
                                    <select class="form-control input-lg m-bot15" name="brand_status">
                                        @if($thuonghieu->brand_status==1)
                                            <option selected value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="1">Hiển thị</option>
                                            <option  selected value="0">Ẩn</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" name="update_brand" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection