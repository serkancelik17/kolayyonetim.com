<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModuleSiteInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites',function (Blueprint $table){
            $table->unsignedInteger('id',true);
            $table->unsignedInteger('location_district_id');
            $table->string('name');
            $table->string('tax_id_no',8)->nullable();
            $table->string('phone_number',10)->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('location_district_id')->references('id')->on('location_districts')->onDelete('NO ACTION')->cascadeOnUpdate();
        });

        Schema::create('site_blocks', function (Blueprint $table){
            $table->unsignedInteger('id',true);
            $table->unsignedInteger('site_id');
            $table->string('name');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('site_id')->references('id')->on('sites')->onDelete("NO ACTION")->cascadeOnUpdate();
        });

        Schema::create('site_unit_types',function (Blueprint $table){
           $table->unsignedInteger('id',true);
           $table->unsignedInteger('site_id'); //
           $table->string('name');

            $table->timestamps();
            $table->softDeletes();

           $table->foreign('site_id')->references('id')->on('sites')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('site_unit_groups',function (Blueprint $table){
            $table->unsignedInteger('id',true);
            $table->unsignedInteger('site_id'); //
            $table->string('name');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('site_id')->references('id')->on('sites')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('site_unit_statuses',function (Blueprint $table){
            $table->unsignedTinyInteger('id',true);
            $table->string('name');
        });


        Schema::create('site_units',function (Blueprint $table){
           $table->unsignedInteger('id',true);
           $table->unsignedInteger('block_id'); //
           $table->string('floor',15)->nullable();
           $table->string('no',50)->nullable();
           $table->float('dues_amount',10,2)->nullable();
           $table->unsignedInteger('type_id')->nullable();//
           $table->unsignedInteger('group_id')->nullable();//
           $table->unsignedSmallInteger('gross')->nullable();
           $table->unsignedSmallInteger('net')->nullable();
           $table->unsignedTinyInteger('status_id')->nullable();//

            $table->timestamps();
            $table->softDeletes();


            $table->foreign('block_id')->references('id')->on('site_blocks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('type_id')->references('id')->on('site_unit_types')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('group_id')->references('id')->on('site_unit_groups')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('status_id')->references('id')->on('site_unit_statuses')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_units');
        Schema::dropIfExists('site_unit_statuses');
        Schema::dropIfExists('site_unit_groups');
        Schema::dropIfExists('site_unit_types');
        Schema::dropIfExists('site_blocks');
        Schema::dropIfExists('sites');
    }
}
