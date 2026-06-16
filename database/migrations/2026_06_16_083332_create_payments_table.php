<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vendor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('reference')->unique();
            $table->string('access_code')->nullable();
            $table->decimal('amount', 10, 2);
            $table->decimal('admin_commission', 10, 2)->default(0);
            $table->decimal('vendor_amount', 10, 2)->default(0);
            $table->string('currency')->default('NGN');
            $table->string('status')->default('pending');
            $table->string('payment_method')->nullable();
            $table->json('paystack_response')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->boolean('paid_to_vendor')->default(false);
            $table->timestamp('paid_to_vendor_at')->nullable();
            $table->timestamps();
            
            $table->index('reference');
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};