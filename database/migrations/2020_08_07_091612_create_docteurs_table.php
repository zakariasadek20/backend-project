<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom',100);
            $table->string('prenom',100);
            $table->string('tele_Portable',50);
            $table->enum('sexe',['m','f']);
            $table->text('a_propos');
            $table->string('code_postal',20);
            $table->decimal('prix_visite',9,0);
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
        Schema::dropIfExists('docteurs');
    }
}
