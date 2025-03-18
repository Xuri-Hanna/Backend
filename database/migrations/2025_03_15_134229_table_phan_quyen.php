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
        Schema::create('phan_quyen', function (Blueprint $table) {
            $table->integer('ma_phan_quyen')->primary();
            $table->integer('ma_nhan_vien');
            $table->integer('ma_quyen');
            $table->foreign('ma_nhan_vien')->references('ma_nhan_vien')->on('tai_khoan');
            $table->foreign('ma_quyen')->references('ma_quyen')->on('quyen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phan_quyen');
    }
};
