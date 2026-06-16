<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'vendor_id',
        'reference',
        'access_code',
        'amount',
        'admin_commission',
        'vendor_amount',
        'currency',
        'status',
        'payment_method',
        'paystack_response',
        'paid_at',
        'paid_to_vendor',
        'paid_to_vendor_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'admin_commission' => 'decimal:2',
        'vendor_amount' => 'decimal:2',
        'paystack_response' => 'array',
        'paid_at' => 'datetime',
        'paid_to_vendor_at' => 'datetime',
        'paid_to_vendor' => 'boolean',
    ];

    // Relationship with order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relationship with user (customer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with vendor
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
}