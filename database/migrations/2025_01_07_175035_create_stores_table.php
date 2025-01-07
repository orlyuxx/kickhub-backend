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
        Schema::create('stores', function (Blueprint $table) {  
            $table->id('store_id');
            $table->foreignId('enterprise_id')->nullable()->constrained('enterprises', 'enterprise_id')->onDelete('set null');
            $table->string('store_name');
            $table->string('street');
            $table->string('city');
            $table->string('region');
            $table->string('contact_number')->nullable();
            $table->time('opening_time');
            $table->time('closing_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
