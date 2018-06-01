<?php

use Illuminate\Database\Seeder;

class FacturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facturas')->insert([
            'factura_numero' => 0,
            'factura_fecha' => '2018-05-12',
            'factura_razon' => 'DEFAULT',
            'factura_nit' => 'DEFAULT',
            'factura_cantidad' => 0,
            'factura_concepto' => 'DEFAULT',
            'factura_monto' => 0,
            'factura_total' => 0,
            'factura_estado' => 'DEFAULT',
            'pagos_id' => null,
        ]);
    }
}
