<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('khach_hang');
            $table->integer('service_id');
            $table->enum('service_type', ['domain', 'hosting', 'vps']);
            $table->decimal('total_price', 10, 2);
            $table->foreignId('discount_id')->nullable()->constrained('discounts');
            $table->enum('status', ['pending', 'paid', 'cancelled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
