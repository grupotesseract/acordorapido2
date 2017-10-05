<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarColunasEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->integer('multaporc')->nullable();
            $table->decimal('multavalor', 10, 2)->nullable();
            $table->integer('multadiariaporc')->nullable();
            $table->decimal('multadiariavalor', 10, 2)->nullable();
            $table->integer('moraporc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropColumn('multadiariavalor', 10, 2);
            $table->dropColumn('multadiariaporc');
            $table->dropColumn('multaporc');
            $table->dropColumn('moraporc');
            $table->dropColumn('multavalor');
        });
    }
}
