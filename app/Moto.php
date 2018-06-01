<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Moto extends Model
{
    use Notifiable;
    protected $table='motos';
    public $timestamps = false;
    protected $fillable=[
        'moto_marca','moto_tipo','moto_modelo','moto_placa','moto_color','moto_observacion','moto_foto'
    ];
}
