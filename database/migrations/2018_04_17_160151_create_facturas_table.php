<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('factura_numero');
            $table->date('factura_fecha');
            $table->string('factura_razon',30);
            $table->string('factura_nit',30);
            $table->integer('factura_cantidad');
            $table->string('factura_concepto',30);
            $table->float('factura_monto');
            $table->float('factura_total');
            $table->string('factura_estado',15);
            $table->unsignedInteger('pagos_id')->nullable();
            $table->foreign('pagos_id')->references('id')->on('pagos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
