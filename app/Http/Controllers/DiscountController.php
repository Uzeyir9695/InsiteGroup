<?php

namespace App\Http\Controllers;

use App\Models\DiscountGroup;
use App\Models\Product;
use App\Models\ProductGroupItem;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function create()
    {
        return view('discount-group.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'discount' => ['required', 'max:255', 'integer'],
        ]);

        DiscountGroup::create([
           'user_id' => auth()->user()->id,
           'discount' => $request->discount
        ]);

        return redirect()->route('discount-group.create')->with('message', 'Discount created successfully');

    }
}
