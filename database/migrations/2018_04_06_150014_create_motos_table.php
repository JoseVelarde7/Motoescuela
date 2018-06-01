<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('moto_marca',25);
            $table->string('moto_tipo',25);
            $table->integer('moto_modelo');
            $table->string('moto_placa',20);
            $table->string('moto_color',20);
            $table->string('moto_observacion',100);
            $table->string('moto_foto',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motos');
    }
}
