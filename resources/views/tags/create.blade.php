@extends('master')

@section('title')
    Thêm mới Tag
@endsection

@section('content')
    <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-2 mb-2">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="name">Image</label>
            <input type="file" id="name" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>

        <a href="{{ route('tags.index') }}" class="btn btn-danger">Quay lại trang chủ</a>
    </form>
@endsection