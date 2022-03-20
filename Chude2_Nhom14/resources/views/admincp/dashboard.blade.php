@extends('admin_layout')
@section('admin_content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('login_admin'))
<div class="alert alert-success">
    {{ session('login_admin') }}
</div>
@endif
<p>Chào mừng bạn đến với trang admin</p>
@endsection