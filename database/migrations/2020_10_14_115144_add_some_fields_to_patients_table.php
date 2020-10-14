<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->foreignId('groupe_sanguin_id')->nullable()->constrained()
                ->onDelete('cascade');
            $table->foreignId('ville_id')->nullable()->constrained()
                ->onDelete('cascade');
            $table->foreignId('pay_id')->nullable()->constrained()
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign('patients_pay_id_foreign');
            $table->dropForeign('patients_ville_id_foreign');
            $table->dropForeign('patients_groupe_sanguin_id_foreign'); 
        });
        Schema::enableForeignKeyConstraints();

    }
}
