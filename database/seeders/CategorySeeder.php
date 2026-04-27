<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices, gadgets, and accessories',
                'is_active' => true,
            ],
            [
                'name' => 'Fashion',
                'description' => 'Clothing, shoes, bags, and accessories',
                'is_active' => true,
            ],
            [
                'name' => 'Home & Living',
                'description' => 'Furniture, decor, kitchenware, and home appliances',
                'is_active' => true,
            ],
            [
                'name' => 'Beauty & Health',
                'description' => 'Cosmetics, skincare, hair care, and wellness products',
                'is_active' => true,
            ],
            [
                'name' => 'Sports & Outdoors',
                'description' => 'Sports equipment, outdoor gear, and fitness accessories',
                'is_active' => true,
            ],
            [
                'name' => 'Toys & Games',
                'description' => 'Toys, board games, video games, and hobby items',
                'is_active' => true,
            ],
            [
                'name' => 'Books & Media',
                'description' => 'Books, e-books, movies, music, and software',
                'is_active' => true,
            ],
            [
                'name' => 'Food & Beverage',
                'description' => 'Groceries, snacks, beverages, and gourmet food',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create([
                'name' => $categoryData['name'],
                'slug' => Str::slug($categoryData['name']),
                'description' => $categoryData['description'],
                'is_active' => $categoryData['is_active'],
            ]);
        }
        
        $this->command->info('Categories seeded successfully!');
    }
}