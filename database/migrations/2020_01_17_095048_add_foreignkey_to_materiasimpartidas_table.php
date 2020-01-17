<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyToMateriasimpartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materiasimpartidas', function (Blueprint $table) {
            
        $table->foreign('docente')->references('id')->on('users');
        $table->foreign('grupo')->references('id')->on('grupos');
        $table->foreign('materia')->references('id')->on('materias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materiasimpartidas', function (Blueprint $table) {
            $table->dropForeign(['docente','grupo','materia']);
        });
    }
}
