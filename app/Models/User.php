<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'store_name',
        'store_description',
        'store_logo',
        'store_banner',
        'vendor_status',
        'vendor_approved_at',
        'phone',
        'address',
        'avatar',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'vendor_approved_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    // Role check methods
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isVendor(): bool
    {
        return $this->role === 'vendor' && $this->vendor_status === 'approved';
    }

    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }

    public function isPendingVendor(): bool
    {
        return $this->role === 'vendor' && $this->vendor_status === 'pending';
    }

    // Relationships
    public function products()
    {
        return $this->hasMany(Product::class, 'vendor_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function wishlists()
    {
        return $this->belongsToMany(Product::class, 'wishlists')->withTimestamps();
    }

    // Add this relationship
    public function logisticsPartner()
    {
        return $this->hasOne(LogisticsPartner::class);
    }

    public function isLogisticsPartner()
    {
        return $this->logisticsPartner && $this->logisticsPartner->status === 'approved';
    }

    public function hasLogisticsApplication()
    {
        return $this->logisticsPartner && $this->logisticsPartner->status === 'pending';
    }
}