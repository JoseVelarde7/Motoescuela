<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('curso_nombre',30);
            $table->string('curso_estudiantes',20);
            $table->string('curso_observacion',20)->nullable();
            /*$table->boolean('curso_estado');
            $table->unsignedInteger('moto_id');
            $table->foreign('moto_id')->references('id')->on('motos');
            $table->unsignedInteger('horario_id');
            $table->foreign('horario_id')->references('id')->on('horarios');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
