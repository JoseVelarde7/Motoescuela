<?php

use Illuminate\Database\Seeder;

class AlumnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumnos')->insert([
            'alumno_nombre' => 'BERTHA BLANCO',
            'alumno_celular' => '78787878',
            'alumno_direccion' => 'LA PAZ BOLIVIA',
            'alumno_ci' => '6123456',
            'alumno_activo' => 1
        ]);
        DB::table('alumnos')->insert([
            'alumno_nombre' => 'JESUS LIMACHI',
            'alumno_celular' => '78787878',
            'alumno_direccion' => 'LA PAZ BOLIVIA',
            'alumno_ci' => '6123457',
            'alumno_activo' => 1
        ]);
        DB::table('alumnos')->insert([
            'alumno_nombre' => 'JHONNY ROJAS',
            'alumno_celular' => '78787878',
            'alumno_direccion' => 'LA PAZ BOLIVIA',
            'alumno_ci' => '6123458',
            'alumno_activo' => 1
        ]);
        DB::table('alumnos')->insert([
            'alumno_nombre' => 'ALVARO APAZA',
            'alumno_celular' => '78787878',
            'alumno_direccion' => 'LA PAZ BOLIVIA',
            'alumno_ci' => '6123459',
            'alumno_activo' => 1
        ]);
        DB::table('alumnos')->insert([
            'alumno_nombre' => 'MARCO FLORES',
            'alumno_celular' => '78787878',
            'alumno_direccion' => 'LA PAZ BOLIVIA',
            'alumno_ci' => '6123460',
            'alumno_activo' => 1
        ]);
    }
}
