<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Get the vendor user
        $vendor = User::where('email', 'vendor@example.com')->first();
        
        if (!$vendor) {
            $this->command->error('Vendor not found! Run UserRoleSeeder first.');
            return;
        }
        
        // Get all categories
        $categories = Category::all();
        
        if ($categories->isEmpty()) {
            $this->command->error('No categories found! Run CategorySeeder first.');
            return;
        }
        
        $products = [
            [
                'name' => 'Classic White T-Shirt',
                'description' => 'Premium cotton classic white t-shirt, perfect for everyday wear. Breathable fabric with a comfortable fit.',
                'price' => 299.00,
                'compare_price' => 599.00,
                'stock_quantity' => 50,
                'sku' => 'TSHIRT-001',
                'is_featured' => true,
            ],
            [
                'name' => 'Slim Fit Jeans',
                'description' => 'Comfortable slim fit jeans with stretch fabric. Perfect for casual and semi-formal occasions.',
                'price' => 899.00,
                'compare_price' => 1499.00,
                'stock_quantity' => 30,
                'sku' => 'JEANS-002',
                'is_featured' => true,
            ],
            [
                'name' => 'Leather Jacket',
                'description' => 'Genuine leather jacket, perfect for bikers and casual wear. Durable and stylish.',
                'price' => 2999.00,
                'compare_price' => 4999.00,
                'stock_quantity' => 15,
                'sku' => 'JACKET-003',
                'is_featured' => false,
            ],
            [
                'name' => 'Running Shoes',
                'description' => 'Lightweight running shoes with excellent cushioning. Perfect for marathons and daily training.',
                'price' => 1599.00,
                'compare_price' => 2499.00,
                'stock_quantity' => 25,
                'sku' => 'SHOES-004',
                'is_featured' => false,
            ],
            [
                'name' => 'Wool Scarf',
                'description' => 'Warm wool scarf, available in multiple colors. Perfect for cold weather.',
                'price' => 399.00,
                'compare_price' => 799.00,
                'stock_quantity' => 40,
                'sku' => 'SCARF-005',
                'is_featured' => false,
            ],
            [
                'name' => 'Smart Watch',
                'description' => 'Feature-rich smart watch with heart rate monitor, GPS, and notifications.',
                'price' => 2499.00,
                'compare_price' => 3999.00,
                'stock_quantity' => 20,
                'sku' => 'WATCH-006',
                'is_featured' => true,
            ],
            [
                'name' => 'Wireless Headphones',
                'description' => 'Noise-cancelling wireless headphones with 30-hour battery life.',
                'price' => 1899.00,
                'compare_price' => 2999.00,
                'stock_quantity' => 35,
                'sku' => 'HEADPHONES-007',
                'is_featured' => false,
            ],
            [
                'name' => 'Coffee Mug Set',
                'description' => 'Set of 4 ceramic coffee mugs with modern design.',
                'price' => 499.00,
                'compare_price' => 899.00,
                'stock_quantity' => 60,
                'sku' => 'MUG-008',
                'is_featured' => false,
            ],
            [
                'name' => 'Yoga Mat',
                'description' => 'Eco-friendly non-slip yoga mat, perfect for home workouts.',
                'price' => 799.00,
                'compare_price' => 1299.00,
                'stock_quantity' => 45,
                'sku' => 'YOGA-009',
                'is_featured' => false,
            ],
            [
                'name' => 'Backpack',
                'description' => 'Water-resistant backpack with laptop compartment, ideal for travel and school.',
                'price' => 1299.00,
                'compare_price' => 1999.00,
                'stock_quantity' => 35,
                'sku' => 'BAG-010',
                'is_featured' => true,
            ],
        ];

        foreach ($products as $productData) {
            // Assign random category
            $category = $categories->random();
            
            Product::updateOrCreate(
                ['sku' => $productData['sku']],
                [
                    'vendor_id' => $vendor->id,
                    'category_id' => $category->id,
                    'name' => $productData['name'],
                    'slug' => Str::slug($productData['name']) . '-' . uniqid(),
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'compare_price' => $productData['compare_price'],
                    'stock_quantity' => $productData['stock_quantity'],
                    'is_active' => true,
                    'is_featured' => $productData['is_featured'],
                    'views_count' => rand(0, 100),
                    'sales_count' => rand(0, 50),
                ]
            );
        }
        
        $this->command->info('Products seeded successfully!');
        $this->command->info('Total products: ' . Product::count());
    }
}