<?php

use App\Models\User2;
use App\Models\UserLicznik;
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
        // Add new columns to the user2 table
        if (!Schema::hasColumn('user2', 'id_fc')) {
            Schema::table('user2', function (Blueprint $table) {
                $table->integer('id_fc')->nullable();
                $table->boolean('teamStat')->default(false);
                $table->boolean('aktwn_u')->default(false);
            });
            // Fetch all records from the userLicznik table
            $userLicznikRecords = UserLicznik::all();

            foreach ($userLicznikRecords as $userLicznik) {
                // Find the matching User2 record and update the new columns
                User2::where('id', $userLicznik->id_u)->update([
                    'id_fc' => $userLicznik->id_fc,
                    'teamStat' => $userLicznik->teamStat,
                    'aktwn_u' => $userLicznik->aktwn_u,
                ]);
            }
        }


    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Fetch all records from the userLicznik table
        $userLicznikRecords = UserLicznik::all();

        foreach ($userLicznikRecords as $userLicznik) {
            // Find the matching User2 record and reset the new columns
            User2::where('id', $userLicznik->id_u)->update([
                'id_fc' => null,
                'teamStat' => false,
                'aktwn_u' => false,
            ]);
        }

        // Remove the new columns from the user2 table
        Schema::table('user2', function (Blueprint $table) {
            $table->dropColumn('id_fc');
            $table->dropColumn('teamStat');
            $table->dropColumn('aktwn_u');
        });
    }
};
