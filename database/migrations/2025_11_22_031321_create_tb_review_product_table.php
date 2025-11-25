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
        Schema::create('review_products', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('user_name');
            $table->string('full_name');
            $table->text('content')->nullable();
            $table->unsignedTinyInteger('rate')->default(5);
            $table->unsignedBigInteger('order_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_products');
    }
};
