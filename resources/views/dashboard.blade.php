@extends('master')
@section('content')
    <h1>Dashboard: Xin chào</h1>
    <p>Muốn đăng nhập thì phải vào đây</p>
    <a class="btn btn-warning " href="{{route('logout')}}">Đăng xuất</a>
 
@endsection