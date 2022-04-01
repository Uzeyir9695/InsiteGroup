@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('carts.index') }}" type="button" class="btn btn-info mb-5">View Cart</a>
        @include('messages')
        <form action="{{ route('carts.store') }}" method="post">
            @csrf
            <div class="form-group mt-5">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" id="quantity" name="quantity">
            </div>
            <div class="form-group mt-3">
                <input name="product_id" type="hidden" value="{{ request()->product_id }}">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add</button>
        </form>
    </div>
@endsection
