<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';

    public $timestamps = false;

    protected $fillable = [
        'user_nombre','user_ci','user_direccion','user_celular','user_cargo','user_tipo','user_user','user_estado','password','user_foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'user_pass', 'remember_token',
    ];
}
