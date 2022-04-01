@extends('layouts.app')
@section('content')
    <div class="container">
        @include('messages')
        <a href="{{ route('products.index') }}" type="button" class="btn btn-info mb-5">View Products</a>

            <form action="{{ route('products.store') }}" method="post">
                @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group mt-3">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
@endsection
