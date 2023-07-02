<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdSeToMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->integer('id_se')->unsigned()->nullable(); // add the new column
            $table->foreign('id_se')->references('id_se')->on('sezon'); // add the foreign key constraint
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropForeign(['id_se']); // drop the foreign key constraint
            $table->dropColumn('id_se'); // drop the column
        });
    }

}
