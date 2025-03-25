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
        Schema::table('orders', function (Blueprint $table) {
            // Xóa khóa ngoại user_id trước khi xóa cột
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // Thêm các cột mới
            $table->string('name'); // Tên khách hàng
            $table->string('email')->unique(); // Email
            $table->string('sdt'); // Số điện thoại
            $table->string('dia_chi'); // Địa chỉ
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Thêm lại user_id (nếu rollback)
            $table->foreignId('user_id')->constrained('khach_hang');

            // Xóa các cột mới
            $table->dropColumn(['name', 'email', 'sdt', 'dia_chi']);
        });
    }
};
