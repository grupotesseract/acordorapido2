<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaPivotImportacaotitulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importacao_titulo', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('importacao_id')->unsigned()->nullable();
            $table->foreign('importacao_id')->references('id')->on('importacoes');

            $table->integer('titulo_id')->unsigned()->nullable();
            $table->foreign('titulo_id')->references('id')->on('titulos');

            $table->boolean('temerro')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('importacao_titulo');
    }
}
