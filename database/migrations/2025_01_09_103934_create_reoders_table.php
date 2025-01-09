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
        Schema::create('reorders', function (Blueprint $table) {
            $table->id('reorder_id');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->integer('quantity');
            $table->date('reorder_date');
            $table->enum('status', ['pending', 'approved', 'completed'])->default('pending');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('store_id')->references('store_id')->on('stores')->onDelete('set null');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('set null');
            $table->foreign('vendor_id')->references('vendor_id')->on('vendors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reorders');
    }
};
