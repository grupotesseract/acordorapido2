<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModeloAvisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelo_avisos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->integer('empresa_id');
            $table->string('titulo');
            $table->string('mensagem');
            $table->string('tipo');
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
        Schema::drop('modelo_avisos');
    }
}
