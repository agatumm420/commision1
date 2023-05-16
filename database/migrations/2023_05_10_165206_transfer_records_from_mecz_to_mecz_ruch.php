<?php

use App\Models\Druzyna;
use App\Models\Mecz;
use App\Models\MeczRuch;
use App\Models\RozgrywkiW;
use App\Models\Sezon;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mecz_to_mecz_ruch', function (Blueprint $table) {
            $mecze = Mecz::all();

            foreach ($mecze as $mecz) {
                // Validate date components
                if (!checkdate((int)$mecz->mies, (int)$mecz->dzien, (int)$mecz->rok)) {
                    // Log the invalid date for troubleshooting
                    Log::error('Invalid date in record: ' . $mecz->id);
                    continue;  // Skip this record
                }

                // Find Druzyna record with matching nazwa_dr
                $druzyna = Druzyna::where('nazwa_dr', $mecz->przeciw)->first();
                $sezon = Sezon::whereRaw('? BETWEEN YEAR(SUBSTRING_INDEX(sezon_se, "/", 1)) AND YEAR(SUBSTRING_INDEX(sezon_se, "/", -1))', [$mecz->rok])->first();
                $rozgrywkiW = RozgrywkiW::where('nazwa_ro', $mecz->rodzaj)->first();

                MeczRuch::create([
                    'data_mr' => Carbon::create((int)$mecz->rok, (int)trim($mecz->mies), (int)trim($mecz->dzien)),

                    'wynik_mr' => $mecz->wynik,
                    'km_mr' => $mecz->km,
                    'link_mr' => null, // Or set a default value
                    'id_se' =>  $sezon ? $sezon->id_se : 44, // Or set a default value
                    'id_dr' => $druzyna ? $druzyna->id_dr : 211 , // Set id_dr from Druzyna model or null if not found
                    'id_ro' =>$rozgrywkiW ? $rozgrywkiW->id_ro : 104, // Or set a default value
                ]);
            }
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mecz_to_mecz_ruch', function (Blueprint $table) {
            //
        });
    }
};
