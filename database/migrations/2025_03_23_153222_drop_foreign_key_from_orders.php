<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['discount_id']); // Gỡ khóa ngoại
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
        });
    }
};
