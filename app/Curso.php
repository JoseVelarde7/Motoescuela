<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Curso extends Model
{
    use Notifiable;
    protected $table='cursos';
    public $timestamps = false;
    protected $fillable=[
        'curso_nombre','curso_estudiantes','curso_observacion','curso_estado','moto_id','horario_id','user_id'
    ];
}
