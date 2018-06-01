<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Alumno extends Model
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable=[
        'alumno_nombre','alumno_celular','alumno_direccion','alumno_ci','alumno_activo'
    ];
}
