<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarColunaAcordoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('titulos', function (Blueprint $table) {
            $table->integer('acordo_id')->unsigned()->nullable();
            $table->foreign('acordo_id')->references('id')->on('acordos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('titulos', function (Blueprint $table) {
            $table->dropColumn('acordo_id');
        });
    }
}
