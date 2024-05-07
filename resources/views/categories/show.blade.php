@extends('master')

@section('title')
    Chi tiết category:{{$category->name}}
@endsection
@section('content')
    <table class="table">
        <tr>
            <th>Trường</th>
            <th>Giá trị</th>
            
        </tr>
        @foreach ($category->toArray() as $key => $value )
            <tr>
                <td>{{$key}}</td>
                <td>{{$value}}</td>
            </tr>
        @endforeach

    </table>
    <a class="btn btn-success " href="{{route('categories.index')}}">Quay về trang chủ</a>
@endsection


