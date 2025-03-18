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
        Schema::create('vps_product', function (Blueprint $table) {
            $table->id();
            $table->string('plan', 50);
            $table->string('cpu', 50);
            $table->string('ram', 50);
            $table->string('storage', 50);
            $table->string('bandwidth', 50);
            $table->string('os', 50);
            $table->enum('status', ['active', 'expired', 'pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vps_product');
    }
};
