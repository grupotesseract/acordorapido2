<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome');
            $table->integer('user_id', false);
            $table->string('turma');
            $table->string('periodo');
            $table->string('responsavel');
            $table->string('celular');
            $table->string('telefone');
            $table->string('telefone2');
            $table->string('celular2');
            $table->string('rg');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes');
    }
}
