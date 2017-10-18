<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoverCamposValoresfixosEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropColumn('multavalor');
            $table->dropColumn('multadiariavalor');
            $table->dropColumn('moraporc');
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
            $table->decimal('multavalor', 10, 2)->nullable();
            $table->decimal('multadiariavalor', 10, 2)->nullable();
            $table->decimal('moraporc', 10, 2)->nullable();
        });
    }
}
