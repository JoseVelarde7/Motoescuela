<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pago extends Model
{
    use Notifiable;
    protected $table='pagos';
    public $timestamps = false;
    protected $fillable=[
        'pago_monto','pago_saldo','alumno_id'
    ];
}
