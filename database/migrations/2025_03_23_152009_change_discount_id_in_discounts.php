<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->string('id')->change(); // Chuyển id thành string
        });
    }

    public function down()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->bigInteger('id')->change(); // Quay lại bigInteger nếu rollback
        });
    }
};
