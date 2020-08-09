<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourDeTravailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jour_de_travails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('docteur_id')->constrained()
                    ->onDelete('cascade');
            $table->time('heure_deb');
            $table->time('heure_fin');
            $table->integer('jour_index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jour_de_travails');
    }
}
