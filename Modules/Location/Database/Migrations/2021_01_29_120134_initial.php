<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Initial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_countries',function (Blueprint $table){
           $table->unsignedTinyInteger('id',true);
           $table->string('name');
        });

        Schema::create('location_cities',function (Blueprint $table){
            $table->unsignedInteger('id',true);
            $table->unsignedTinyInteger('country_id');
            $table->string('name');

            $table->foreign('country_id')->references('id')->on('location_countries')->onUpdate('CASCADE')->onDelete("CASCADE");
        });

        Schema::create('location_districts',function (Blueprint $table){
            $table->unsignedInteger('id',true);
            $table->unsignedInteger('city_id');
            $table->string('name');

            $table->foreign('city_id')->references('id')->on('location_cities')->onUpdate('CASCADE')->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_districts');
        Schema::dropIfExists('location_cities');
        Schema::dropIfExists('location_countries');

    }
}
