<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoracionesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoraciones_users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('envia_valora_id');
            $table->foreign('envia_valora_id')->references('id')->on('users');

            $table->unsignedBigInteger('recibe_valora_id');
            $table->foreign('recibe_valora_id')->references('id')->on('users');

            $table->integer('valor');
            $table->string('comentarios');

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
        Schema::dropIfExists('valoraciones_users');
    }
}
