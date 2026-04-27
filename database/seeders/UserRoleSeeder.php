<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@vefiri.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );
        
        // Create Customer User
        User::updateOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'John Customer',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'is_active' => true,
            ]
        );
        
        // Create Approved Vendor
        User::updateOrCreate(
            ['email' => 'vendor@example.com'],
            [
                'name' => 'Jane Vendor',
                'password' => Hash::make('password'),
                'role' => 'vendor',
                'vendor_status' => 'approved',
                'store_name' => 'Fashion Haven',
                'store_description' => 'Premium fashion and accessories store',
                'phone' => '123-456-7890',
                'address' => '123 Business St, City',
                'is_active' => true,
                'vendor_approved_at' => now(),
            ]
        );
        
        $this->command->info('Users seeded successfully!');
    }
}