<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeczRuchUserTable extends Migration
{
public function up()
{
Schema::create('mecz_ruch_user', function (Blueprint $table) {
$table->id();
$table->unsignedBigInteger('mecz_ruch_id');
$table->unsignedBigInteger('user2_id');
$table->foreign('mecz_ruch_id')->references('id_mr')->on('meczRuch')->onDelete('cascade');
$table->foreign('user2_id')->references('id')->on('user2')->onDelete('cascade');
// Add any additional columns needed in the pivot table here
});
}

public function down()
{
Schema::dropIfExists('mecz_ruch_user');
}
}
