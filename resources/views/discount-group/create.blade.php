@extends('layouts.app')
@section('content')
    <div class="container">
        @include('messages')

        <a href="{{ route('products.index') }}" type="button" class="btn btn-info mb-5">View Products</a>

        <form action="{{ route('discount-group.store') }}" method="post">
            @csrf
            <div class="form-group mt-5">
                <label for="discount">Discount (in percent):</label>
                <input type="text" class="form-control" id="discount" name="discount">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
@endsection
