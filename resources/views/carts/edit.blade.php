@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('products.index') }}" type="button" class="btn btn-info mb-5">View Products</a>
        @include('messages')
        <form action="{{ route('carts.update', $cart->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group mt-5">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" id="quantity" value="{{ $cart->quantity }}" name="quantity">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Save</button>
        </form>
    </div>
@endsection
