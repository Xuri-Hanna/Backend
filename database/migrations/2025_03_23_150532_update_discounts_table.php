<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->dropColumn('code'); // Xóa cột code
            $table->string('id', 20)->change(); // Chuyển id sang VARCHAR(20)
        });
    }

    public function down()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->string('code')->nullable(); // Khôi phục cột code
            $table->bigIncrements('id')->change(); // Đổi id về dạng tự tăng
        });
    }
};
