<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add role column (admin, customer, vendor)
            $table->enum('role', ['admin', 'customer', 'vendor'])->default('customer')->after('email');
            
            // Vendor-specific fields
            $table->string('store_name')->nullable()->after('role');
            $table->text('store_description')->nullable()->after('store_name');
            $table->string('store_logo')->nullable()->after('store_description');
            $table->string('store_banner')->nullable()->after('store_logo');
            $table->enum('vendor_status', ['pending', 'approved', 'rejected'])->default('pending')->after('store_banner');
            $table->timestamp('vendor_approved_at')->nullable()->after('vendor_status');
            
            // Additional user fields
            $table->string('phone')->nullable()->after('email');
            $table->text('address')->nullable()->after('phone');
            $table->string('avatar')->nullable()->after('address');
            $table->boolean('is_active')->default(true)->after('avatar');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
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
                'is_active'
            ]);
        });
    }
};