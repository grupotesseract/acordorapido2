<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avisos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('tituloaviso');
            $table->text('texto');
            $table->integer('user_id', false);
            $table->integer('cliente_id', false)->nullable();
            $table->integer('titulo_id', false)->nullable();
            $table->integer('status')->default(0);
            $table->string('estado')->nullable();
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
        Schema::drop('avisos');
    }
}
