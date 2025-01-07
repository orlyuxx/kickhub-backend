<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterpriseTable extends Migration // Change class name to CreateEnterpriseTable
{
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id('enterprise_id');
            $table->string('name');
            $table->string('street');
            $table->string('city');
            $table->string('region');
            $table->string('contact_number')->nullable();
            $table->string('email_address')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enterprises');
    }
}