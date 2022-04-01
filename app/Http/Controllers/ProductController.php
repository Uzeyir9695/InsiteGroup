<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DiscountGroup;
use App\Models\Product;
use App\Models\ProductGroupItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'price' => ['required',  'min:1', 'max:200000'],
        ]);

        Product::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'price' => $request->price
        ]);
        return redirect()->route('products.create')->with('message', 'Product created successfully');
    }

    public function createDiscount(Product $product)
    {
        $discounts = DiscountGroup::all();
        return view('product-discount.create', compact('product', 'discounts'));
    }

    public function storeDiscount(Request $request)
    {
        $request->validate([
            'group_id' => ['required'],
        ]);

        ProductGroupItem::create([
           'group_id' => $request->group_id,
           'product_id' => $request->product_id
        ]);

        return redirect()->route('product-discount.create', $request->product_id)->with('message', 'Discount created successfully');

    }
}
