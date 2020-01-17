<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriamatriculadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiamatriculadas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('alumno')->unsigned()->nullable();
            $table->biginteger('materia')->nullable();
            $table->biginteger('grupo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiamatriculadas');
    }
}
