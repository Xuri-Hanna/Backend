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
        Schema::create('hosting_product', function (Blueprint $table) {
            $table->id();
            $table->string('plan', 50);
            $table->string('disk_space', 50);
            $table->string('bandwidth', 50);
            $table->integer('accounts_ftp');
            $table->integer('addon_domains');
            $table->integer('sub_domains');
            $table->enum('status', ['active', 'expired', 'pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hosting_product');
    }
};
