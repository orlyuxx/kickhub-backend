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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->string('name');
            $table->string('color');
            $table->enum('gender', ['men', 'women', 'unisex'])->nullable();
            $table->string('size');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('brand_id')->references('brand_id')->on('brands')->onDelete('set null');
            $table->foreign('sub_category_id')->references('sub_category_id')->on('sub_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
