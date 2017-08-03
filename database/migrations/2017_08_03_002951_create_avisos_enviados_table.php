<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAvisosEnviadosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avisos_enviados', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id');
            $table->integer('aviso_id');
            $table->integer('tipodeaviso')->default(0);
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
        Schema::drop('avisos_enviados');
    }
}
