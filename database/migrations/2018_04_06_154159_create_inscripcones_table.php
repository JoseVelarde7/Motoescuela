<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripconesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ins_fecha');
            $table->string('ins_obs',100);
            $table->boolean('inscripcion_estado');
            $table->unsignedInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->unsignedInteger('moto_id');
            $table->foreign('moto_id')->references('id')->on('motos');
            $table->unsignedInteger('horario_id');
            $table->foreign('horario_id')->references('id')->on('horarios');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripcones');
    }
}
