<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('titulo');
            $table->text('texto');
            $table->integer('user_id', false);
            $table->integer('cliente_id', false);
            $table->integer('titulo_id', false);
            $table->integer('status')->default(0);
            $table->string('estado');
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
