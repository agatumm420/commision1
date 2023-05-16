<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Rozgrywki;
use App\Models\RozgrywkiW;

class TransferRozgrywkiToRozgrywkiW extends Migration
{
    public function up()
    {
        DB::transaction(function () {
            try {
                // Transfer records from rozgrywki to rozgrywkiW
                DB::statement('INSERT INTO rozgrywkiW (nazwa_ro) SELECT nazwa_ro FROM rozgrywki');

                // Update meczRuch and mecz_widzews foreign key references
                $rozgrywki_records = DB::table('rozgrywki')->get();

                // Disable foreign key checks
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');

                foreach ($rozgrywki_records as $record) {
                    $new_id = DB::table('rozgrywkiW')->where('nazwa_ro', $record->nazwa_ro)->first()->id_ro;

                    DB::table('meczRuch')->where('id_ro', $record->id_ro)->update(['id_ro' => $new_id]);
                    DB::table('meczWidzew')->where('id_ro', $record->id_ro)->update(['id_ro' => $new_id]);
                }

                // Enable foreign key checks
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');

                // Drop rozgrywki table
                Schema::dropIfExists('rozgrywki');
            } catch (\PDOException $e) {
                // Handle PDOExceptions here
                // ...

                // Rollback the transaction
                DB::rollBack();
            } catch (\Exception $e) {
                // Handle other exceptions here
                // ...

                // Rollback the transaction
                DB::rollBack();
            }
        });

    }








    public function down()
    {
        DB::beginTransaction();

        try {
            // Update meczRuch table to reference rozgrywki table again
            DB::table('meczRuch')->where('id_ro', '>', 10)->update(['id_ro' => DB::raw('id_ro - 10')]);

            // Drop the rozgrywkiW table and the foreign key from meczWidzew
            Schema::table('meczWidzew', function (Blueprint $table) {
                $table->dropForeign('meczWidzew_ibfk_3');
            });
            Schema::dropIfExists('rozgrywkiW');

            // Rename rozgrywki_temp to rozgrywki and re-add foreign key to meczRuch
            Schema::table('meczRuch', function (Blueprint $table) {
                $table->dropForeign('meczRuch_ibfk_3');
            });
            Schema::rename('rozgrywki_temp', 'rozgrywki');
            Schema::table('meczRuch', function (Blueprint $table) {
                $table->foreign('id_ro', 'meczRuch_ibfk_3')->references('id_ro')->on('rozgrywki')->onDelete('cascade')->onUpdate('cascade');
            });

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }



}
