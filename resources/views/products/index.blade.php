@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('products.create') }}" type="button" class="btn btn-primary">Add Product</a>
        <a href="{{ route('discount-group.create') }}" type="button" class="btn btn-info mx-5">Create new discount</a>
        <a type="button"  class="btn btn-warning" href="{{ route('carts.index') }}">View Cart</a>
        <h1 class="mt-5">Products List</h1>

        <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Cart</th>
                <th>Discount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td><a type="button"  class="btn btn-info" href="{{ route('carts.create') }}?product_id={{ $product->id }}">Add to cart</a></td>
                    <td><a type="button"  class="btn btn-info" href="{{ route('product-discount.create', $product->id) }}">Make a Discount</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
