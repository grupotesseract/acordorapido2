<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->date('vencimento')->nullable();
            $table->decimal('valor', 18, 2)->nullable();
            $table->string('titulo');
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
