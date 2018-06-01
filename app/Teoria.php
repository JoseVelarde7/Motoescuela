<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Teoria extends Model
{
    use Notifiable;
    protected $table='teoria';
    public $timestamps = false;
    protected $fillable=[
        'teoria_fecha','teoria_respuestas','alumno_id'
    ];
}
