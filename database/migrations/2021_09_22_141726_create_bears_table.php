<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bears', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('street');
            $table->string('street_number');
            $table->string('postal_code');   
            $table->string('city');     
            $table->string('country');  
            $table->string('latitude');  
            $table->string('longitude');
            $table->string('email')->unique(); 
            $table->string('distance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bears');
    }
}
