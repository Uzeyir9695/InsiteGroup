@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('products.index') }}" type="button" class="btn btn-primary mb-5">View Product</a>
        @include('messages')
        <h1>Cart List</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @forelse($carts as $cart)
                <tr>
                    <td>{{ $cart->id }}</td>
                    <td>{{ $cart->product->title }}</td>
                    <td>{{ (!$containsAllValues and in_array($cart->product_id, $discount_products)) ? 'Sale: '.'$'. \App\Models\ProductGroupItem::discount($cart) : \App\Models\ProductGroupItem::price($cart) }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td><a type="button"  class="btn btn-info" href="{{ route('carts.edit', $cart->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('carts.destroy', $cart->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <h2>Your cart is empty</h2>
                <a href="{{ route('products.index') }}" type="button" class="btn btn-info mb-5">Shop now</a>

            @endforelse
            </tbody>
        </table>
    </div>

@endsection
