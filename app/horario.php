<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class horario extends Model
{
    use Notifiable;
    protected $table='horarios';
    public $timestamps = false;
    protected $fillable=[
        'horario_nombre','horario_entrada','horario_salida','horario_dias','horario_tipo'
    ];
}
