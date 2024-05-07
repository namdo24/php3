@extends('master')
@section('content')
    <h1>Trang chủ</h1>
   <a class="btn btn-primary " href="{{route('signup-form')}}">Đăng ký</a>
   <a class="btn btn-warning " href="{{route('login-form')}}">Đăng nhập</a>

@endsection