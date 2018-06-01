<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Asistencia extends Model
{
    use Notifiable;
    protected $table='asistencias';
    public $timestamps = false;
    protected $fillable=[
        'asistencia_fecha','asistencia_entrada','asistencia_salida','user_id'
    ];
}
