<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_nombre',50);
            $table->string('user_ci',50)->unique();
            $table->string('user_direccion',100);
            $table->string('user_celular',20);
            $table->string('user_cargo',30);
            $table->string('user_tipo',30);
            $table->string('user_user',20)->unique();
            $table->string('password');
            $table->boolean('user_estado');
            $table->string('user_foto',20);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
