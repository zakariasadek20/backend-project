<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVilleIdToDocteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docteurs', function (Blueprint $table) {
            $table->foreignId('ville_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('docteurs', function (Blueprint $table) {
            //
            $table->dropForeign('docteurs_ville_id_foreign');
        });
    }
}
