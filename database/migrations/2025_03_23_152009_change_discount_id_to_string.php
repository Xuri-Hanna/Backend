<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('discount_id')->change(); // Chuyển sang string
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('discount_id')->change(); // Quay lại bigInteger nếu rollback
        });
    }
};
