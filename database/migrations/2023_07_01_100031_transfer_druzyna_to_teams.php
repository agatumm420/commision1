<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Druzyna;
use App\Models\Team;

class TransferDruzynaToTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Fetch all records from Druzyna model
        $druzyne = Druzyna::all();

        // Transfer each record to Team model
        foreach ($druzyne as $druzyna) {
            Team::create([
                'name' => $druzyna->nazwa_dr,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // If necessary, you can also define how to reverse this operation
        // For example, you could delete all records in the teams table:
        // DB::table('teams')->delete();
    }
}
