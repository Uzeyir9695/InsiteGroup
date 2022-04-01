<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroupItem extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'product_id'];


    public function discountGroup()
    {
        return $this->belongsTo(DiscountGroup::class, 'group_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function discount($cart)
    {
        $min_quantity = Cart::min('quantity');
        $group_id = ProductGroupItem::where('product_id', $cart->product_id)->value('group_id');
        $discount = DiscountGroup::where('id', $group_id)->value('discount');
        $sale_price = $cart->product->price * $min_quantity - ($discount / 100) * ($cart->product->price * $min_quantity) + ($cart->product->price * ($cart->quantity - $min_quantity));
        return $sale_price;
    }

    public static function price($cart)
    {
       return $cart->product->price * $cart->quantity;
    }
}
