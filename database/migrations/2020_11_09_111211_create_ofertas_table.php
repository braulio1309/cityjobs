<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('creador');
            $table->foreign('creador')->references('id')->on('users');

            $table->string('titulo');

            $table->unsignedBigInteger('categoria');
            $table->foreign('categoria')->references('id')->on('categorias');
            $table->unsignedBigInteger('subcatego');
            $table->foreign('subcatego')->references('id')->on('subcategorias');
            $table->unsignedBigInteger('especialida');
            $table->foreign('especialida')->references('id')->on('especialidades');

            $table->string('latitud');
            $table->string('longitud');
            $table->string('direccion');
            $table->float('presupuesto_hora',8,2);

            $table->date('fecha_dia');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->longText('descripcion');
            $table->integer('estatus');
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
        Schema::dropIfExists('ofertas');
    }
}
