@extends('master')

@section('title')
    Danh sách Category
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary mt-2 mb-2" href="{{ route('categories.create') }}">Create</a>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="{{ route('categories.index') }}">
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
            <th>ACTION</th>
        </tr>
        @php
            $keyword = request('keyword');
            $replacement = "<b>$keyword</b>";
        @endphp
        @foreach ($data as $item)
            <tr>
                {{-- <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td> --}}
                <td>{!! str_replace($keyword, $replacement, $item->id) !!}</td>
                <td>{!! str_replace($keyword, $replacement, $item->name) !!}</td>
                <td class="d-flex">
                    <a href="{{ route('categories.show', $item->id) }}" class="btn btn-info me-2 ">Show</a>
                    <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-warning me-2 ">Edit</a>
                    <form action="{{ route('categories.destroy', $item->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" onclick="return confirm('Chắc chắn xóa không?')"
                            class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $data->links() }}
@endsection
