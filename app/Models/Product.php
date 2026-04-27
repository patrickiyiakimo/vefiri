<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'compare_price',
        'stock_quantity',
        'sku',
        'images',
        'attributes',
        'is_active',
        'is_featured',
        'views_count',
        'sales_count',
    ];

    protected $casts = [
        'images' => 'array',
        'attributes' => 'array',
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    // Relationship with vendor (user)
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    // Relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship with order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Get formatted price
    public function getFormattedPriceAttribute()
    {
        return '₱' . number_format($this->price, 2);
    }

    // Get discount percentage
    public function getDiscountPercentageAttribute()
    {
        if ($this->compare_price && $this->compare_price > $this->price) {
            return round((( $this->compare_price - $this->price ) / $this->compare_price) * 100);
        }
        return 0;
    }

    // Scope for active products
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for featured products
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for in-stock products
    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }
}