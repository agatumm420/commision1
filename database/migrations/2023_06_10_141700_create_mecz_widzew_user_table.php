<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeczWidzewUserTable extends Migration
{
    public function up()
    {
        Schema::create('mecz_widzew_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mecz_widzew_id');
            $table->unsignedBigInteger('user2_id');
            $table->foreign('mecz_widzew_id')->references('id_mw')->on('meczWidzew')->onDelete('cascade');
            $table->foreign('user2_id')->references('id')->on('user2')->onDelete('cascade');
            // Add any additional columns needed in the pivot table here
        });
    }

    public function down()
    {
        Schema::dropIfExists('mecz_widzew_user');
    }
}
