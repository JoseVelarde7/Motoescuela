<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Examen extends Model
{
    use Notifiable;

    protected $table='preguntas';

    public $timestamps = false;

    protected $fillable=[
        'pregunta_pregunta','pregunta_foto'
    ];
}
