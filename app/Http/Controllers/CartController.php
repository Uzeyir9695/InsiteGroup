<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductGroupItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $min_quantity = Cart::min('quantity');
        $cart_products =Cart::pluck('product_id')->toArray();
        $discount_products = ProductGroupItem::pluck('product_id')->toArray();
        $containsAllValues = array_diff($discount_products, $cart_products);

        $carts = Cart::with('product')->get();
        return view('carts.index', compact('carts', 'containsAllValues', 'min_quantity', 'discount_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => ['required', 'max:10', 'integer'],
        ]);

        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('carts.create', ['product_id' => $request->product_id])->with('message', 'Product successfully added to the cart! ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        return view('carts.edit', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
       $data = $request->validate([
            'quantity' => ['required', 'max:10', 'integer'],
        ]);

        $cart->update($data);

        return redirect()->route('carts.edit', $cart->id)->with('message', 'Cart updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('carts.index')->with('message', 'Item removed successfully!');
    }
}
