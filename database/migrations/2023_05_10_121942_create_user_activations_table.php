<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('user_activations')) {
            Schema::create('user_activations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->string('token');
                $table->timestamps();
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activations');
    }
};
