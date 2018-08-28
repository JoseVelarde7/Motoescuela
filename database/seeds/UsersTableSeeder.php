<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_nombre' => 'Juan Jose Velarde',
            'user_ci' => '9221121 LP',
            'user_direccion' => str_random(10),
            'user_celular' => str_random(10),
            'user_cargo' => str_random(10),
            'user_tipo' => "USER1",
            'user_user' => "juan",
            'password' => bcrypt('secret'),
            'user_foto' => str_random(10)
        ]);
    }
}
