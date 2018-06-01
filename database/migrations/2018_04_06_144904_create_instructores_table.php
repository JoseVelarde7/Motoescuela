<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inst_nombre',50);
            $table->string('inst_celular',50);
            $table->string('inst_direccion',200);
            $table->string('inst_ci',20)->unique();
            $table->string('inst_foto',20)->nullable();
            $table->string('inst_observacion',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructores');
    }
}
