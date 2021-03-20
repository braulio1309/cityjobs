<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_tipoplan');
            $table->foreign('id_tipoplan')->references('id')->on('tipoplans');
            
            $table->integer('tipo')->comment('1, 2, 3');
            $table->string('nombre');
            $table->longText('descripcion');
            $table->integer('dias_durac');
            $table->float('costo',8,2);
            $table->string('ahorro')->comment('texto de % de ahorra segun plan');
            $table->integer('kms_minimo');

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
        Schema::dropIfExists('planes');
    }
}
