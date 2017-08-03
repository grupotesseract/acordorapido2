<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('turma')->nullable();
            $table->string('periodo')->nullable();
            $table->string('responsavel')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefone')->nullable();
            $table->string('telefone2')->nullable();
            $table->string('celular2')->nullable();
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
