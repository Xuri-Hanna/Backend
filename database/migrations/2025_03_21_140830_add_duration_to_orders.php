<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('duration_months')->default(1)->after('total_price'); // Thêm cột thời hạn thuê
        });
    }

    public function down() {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('duration_months'); // Xóa cột nếu rollback
        });
    }
};
