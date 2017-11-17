<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaLigacoestelefonicasAcordo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligacaoacordos', function (Blueprint $table) {
            
            $table->increments('id');
            $table->timestamps();
            $table->integer('acordo_id')->unsigned();
            $table->foreign('acordo_id')->references('id')->on('acordos')->onDelete('cascade');
            $table->string('duracao');
            $table->string('datahora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligacaoacordos');
    }
}
