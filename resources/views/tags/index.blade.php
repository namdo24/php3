@extends('master')

@section('title')
    Danh sách Tags
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary mt-2 mb-2" href="{{ route('tags.create') }}">Create</a>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="{{ route('tags.index') }}">
                <div class="mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="keyword" id="keyword" value="{{ request('keyword') }}" placeholder="Keyword" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>IMAGE</th>
            <th>ACTION</th>
        </tr>
       
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td><img src="\storage{{ $item->image }}" alt=""></td>
               
               
                <td class="d-flex">
                    <a href="{{ route('tags.show', $item->id) }}" class="btn btn-info me-2 ">Show</a>
                    <a href="{{ route('tags.edit', $item->id) }}" class="btn btn-warning me-2 ">Edit</a>
                    <form action="{{ route('tags.destroy', $item->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" onclick="return confirm('Chắc chắn xóa không?')"
                            class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    
@endsection
