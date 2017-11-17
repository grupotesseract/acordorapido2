<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaParcelamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('numparcela');
            $table->decimal('valorparcela', 10, 2);
            $table->date('dataparcela');
            $table->string('situacao');
            $table->integer('acordo_id')->unsigned();
            $table->foreign('acordo_id')->references('id')->on('acordos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcelamentos');
    }
}
