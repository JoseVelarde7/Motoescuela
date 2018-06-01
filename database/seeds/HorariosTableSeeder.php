<?php

use Illuminate\Database\Seeder;

class HorariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horarios')->insert([
            'horario_nombre' => 'PERIODO 1',
            'horario_entrada' => '08:30:00',
            'horario_salida' => '10:30:00',
            'horario_dias' => 'LUNES A VIERNES',
            'horario_tipo' => 'REGULAR'
        ]);

        DB::table('horarios')->insert([
            'horario_nombre' => 'PERIODO 2',
            'horario_entrada' => '10:30:00',
            'horario_salida' => '12:30:00',
            'horario_dias' => 'LUNES A VIERNES',
            'horario_tipo' => 'REGULAR'
        ]);

        DB::table('horarios')->insert([
            'horario_nombre' => 'PERIODO 3',
            'horario_entrada' => '14:30:00',
            'horario_salida' => '16:30:00',
            'horario_dias' => 'LUNES A VIERNES',
            'horario_tipo' => 'REGULAR'
        ]);

        DB::table('horarios')->insert([
            'horario_nombre' => 'PERIODO 4',
            'horario_entrada' => '16:30:00',
            'horario_salida' => '18:30:00',
            'horario_dias' => 'LUNES A VIERNES',
            'horario_tipo' => 'REGULAR'
        ]);
    }
}
