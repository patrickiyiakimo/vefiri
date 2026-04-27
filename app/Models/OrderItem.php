<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'vendor_id',
        'quantity',
        'price',
        'total',
        'attributes',
    ];

    protected $casts = [
        'attributes' => 'array',
    ];

    // Relationship with order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relationship with product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship with vendor
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
}