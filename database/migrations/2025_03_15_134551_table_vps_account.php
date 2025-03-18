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
        Schema::create('vps_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vps_id')->constrained('vps_product');
            $table->string('ip_address', 50);
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('os', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vps_accounts');
    }
};
