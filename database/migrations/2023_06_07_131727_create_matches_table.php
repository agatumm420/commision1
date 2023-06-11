<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->dateTime('match_date');
            $table->string('score')->nullable();
            $table->unsignedBigInteger('team1_id');
            $table->unsignedBigInteger('team2_id');
            $table->string('link')->nullable();
            $table->unsignedBigInteger('rozgrywki_w_id'); // add this field
            $table->timestamps();

            $table->foreign('team1_id')->references('id')->on('teams');
            $table->foreign('team2_id')->references('id')->on('teams');
            $table->foreign('rozgrywki_w_id')->references('id')->on('rozgrywkiW'); // set up foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropForeign(['team1_id', 'team2_id', 'rozgrywki_w_id']); // drop foreign keys
        });

        Schema::dropIfExists('matches');
    }
}
