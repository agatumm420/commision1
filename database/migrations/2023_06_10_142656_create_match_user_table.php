<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchUserTable extends Migration
{
    public function up()
    {
        Schema::create('match_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user2_id');
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade'); // Assuming the matches table name is 'matches'
            $table->foreign('user2_id')->references('id')->on('user2')->onDelete('cascade');
            // Add any additional columns needed in the pivot table here
        });
    }

    public function down()
    {
        Schema::dropIfExists('match_user');
    }
}
