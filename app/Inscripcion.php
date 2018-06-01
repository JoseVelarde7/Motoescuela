<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Inscripcion extends Model
{
    use Notifiable;

    protected $table='inscripcones';

    public $timestamps = false;

    protected $fillable=[
        'ins_fecha','ins_obs','alumno_id','curso_id'
    ];
}
