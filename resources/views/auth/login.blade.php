@extends('master')

@section('content')
    <h1>Signup</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mt-2 mb-2">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{old('email')}}" id="email" class="form-control">
        </div>

        <div class="mt-2 mb-2">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
