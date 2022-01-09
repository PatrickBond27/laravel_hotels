<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// This class migrates or in other words adds and implements the entities for the hotels table in the database.
class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('star_rating');
            $table->string('phone_number');
            $table->string('image_location');
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
        Schema::dropIfExists('hotels');
    }
}
