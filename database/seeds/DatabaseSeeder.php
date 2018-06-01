<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            FacturasTableSeeder::class,
            AlumnosTableSeeder::class,
            HorariosTableSeeder::class
        ]);
    }
}
