<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip_code',
        'status',              // Make sure this is here
        'payment_status',      // Make sure this is here
        'subtotal',
        'tax',
        'shipping_cost',
        'discount',
        'total',
        'shipping_address',
        'billing_address',
        'payment_method',
        'payment_id',
        'notes',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    // Relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with order items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    // Relationship with payment
    public function payment()
    {
        if (Schema::hasTable('payments')) {
            return $this->hasOne(Payment::class);
        }
        return null;
    }
    
    // Accessor for full name
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}