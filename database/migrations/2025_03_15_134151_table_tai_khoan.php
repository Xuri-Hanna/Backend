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
        Schema::create('tai_khoan', function (Blueprint $table) {
            $table->integer('ma_nhan_vien')->primary();
            $table->string('email', 100);
            $table->string('password', 100);
            $table->enum('status', [0, 1]);
            $table->string('chuc_vu', 50);
            $table->string('hoten', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_khoan');
    }
};
