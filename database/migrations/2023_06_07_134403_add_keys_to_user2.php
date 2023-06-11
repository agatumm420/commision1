<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user2', function (Blueprint $table) {
            $table->unsignedBigInteger('match_id')->nullable()->after('id');
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('set null');

            $table->unsignedBigInteger('mecz_ruch_id')->nullable()->after('match_id');
            $table->foreign('mecz_ruch_id')->references('id')->on('meczRuch')->onDelete('set null');

            $table->unsignedBigInteger('mecz_widzew_id')->nullable()->after('mecz_ruch_id');
            $table->foreign('mecz_widzew_id')->references('id')->on('meczWidzew')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user2', function (Blueprint $table) {
            $table->dropForeign(['match_id']);
            $table->dropColumn('match_id');

            $table->dropForeign(['mecz_ruch_id']);
            $table->dropColumn('mecz_ruch_id');

            $table->dropForeign(['mecz_widzew_id']);
            $table->dropColumn('mecz_widzew_id');
        });
    }
};
