<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_languages',function(Blueprint $table){
            $table->engine='InnoDB';
            $table->unsignedTinyInteger('id',true);
            $table->string('code',2);
            $table->string('title',50);
        });

        Schema::table('users',function (Blueprint $table){

           $table->string('phone_number',13)->nullable()->after('remember_token');
           $table->string('picture')->default('default.jpg')->after('remember_token');
           $table->unsignedTinyInteger('language_id')->after('remember_token')->default(1);

           $table->foreign('language_id')->references('id')->on('user_languages');
        });


        Schema::create('user_cards',function(Blueprint $table){
           $table->unsignedInteger('id',true);
           $table->unsignedBigInteger('user_id');
           $table->string('title');
           $table->string('name_surname');
           $table->string('number',16);
           $table->unsignedTinyInteger('expire_month');
           $table->unsignedSmallInteger('expire_year');
           $table->unsignedSmallInteger('cvc');

           $table->softDeletes();

           $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('user_types',function (Blueprint $table){
           $table->unsignedTinyInteger('id',true);
           $table->string('title');
        });

        Schema::create('user_sites',function(Blueprint $table){
            $table->unsignedInteger('id',true);
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('site_id');
            $table->unsignedTinyInteger('user_type_id');
            $table->unsignedInteger('person_id')->nullable();

            $table->softDeletes();

            $table->foreign('user_type_id')->references('id')->on('user_types');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table){

            $table->dropForeign('users_language_id_foreign');
           $table->dropColumn(['phone_number','picture','language_id']);

        });

        Schema::dropIfExists('user_languages');
        Schema::dropIfExists('user_cards');
        Schema::dropIfExists('user_sites');


        Schema::dropIfExists('user_types');
    }
}
