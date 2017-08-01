<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTitulosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('estado');
            $table->integer('cliente_id', false);
            $table->integer('empresa_id', false);
            $table->boolean('pago');
            $table->date('vencimento');
            $table->decimal('valor', 18, 2);
            $table->string('titulo');
            $table->integer('importacao_id', false);
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
        Schema::drop('titulos');
    }
}
