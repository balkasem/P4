<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefugeeFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_refugee', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //

            $table->integer('refugee_id')->unsigned();
            $table->integer('family_id')->unsigned();

            # Make foreign keys
            $table->foreign('refugee_id')->references('id')->on('refugees');
            $table->foreign('family_id')->references('id')->on('families');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refugee_family');
    }
}
