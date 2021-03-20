<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertaCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta_candidatos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_oferta');
            $table->foreign('id_oferta')->references('id')->on('ofertas');

            $table->unsignedBigInteger('candidato');
            $table->foreign('candidato')->references('id')->on('users');

            $table->float('precio_hora',8,2);
            $table->date('fecha_dia');
            $table->time('hora_inicio');
            $table->time('hora_fin');

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
        Schema::dropIfExists('oferta_candidatos');
    }
}
