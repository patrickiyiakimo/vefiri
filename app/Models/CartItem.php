<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'attributes',
    ];

    protected $casts = [
        'attributes' => 'array',
    ];

    // Relationship with cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Relationship with product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Calculate subtotal for this item
    public function getSubtotalAttribute()
    {
        return $this->quantity * $this->product->price;
    }
}