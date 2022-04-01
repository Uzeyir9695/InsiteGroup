@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('products.index') }}" type="button" class="btn btn-info mb-5">View Products</a>
        <a href="{{ route('discount-group.create') }}" type="button" class="btn btn-primary mx-5 mb-5">Create new discount</a>

        @include('messages')

        <form action="{{ route('product-discount.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="group">Select discount number (in percent):</label>
                <select class="form-control" id="group_id" name="group_id">
                    <option value="" selected disabled>@if($discounts->count() < 1) There is not discount. Create a new one @endif Choose one</option>
                    @foreach($discounts as $discount)
                        <option value="{{ $discount->id }}">{{ $discount->discount }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <input name="product_id" type="hidden" value="{{ request()->segment(2) }}">
                {{--                <label for="price">Price:</label>--}}
                {{--                <input type="text" class="form-control" id="price" name="price">--}}
            </div>
            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
@endsection
