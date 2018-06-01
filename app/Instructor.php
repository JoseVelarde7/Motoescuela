<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Instructor extends Model
{
    use Notifiable;

    protected $table='instructores';

    public $timestamps = false;

    protected $fillable=[
        'inst_nombre','inst_celular','inst_direccion','inst_ci','inst_foto','inst_observacion'
    ];
}
