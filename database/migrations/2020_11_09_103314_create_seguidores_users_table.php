<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguidoresUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguidores_users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('seguidor_id');
            $table->foreign('seguidor_id')->references('id')->on('users');

            $table->unsignedBigInteger('seguido_id');
            $table->foreign('seguido_id')->references('id')->on('users');

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
        Schema::dropIfExists('seguidores_users');
    }
}
