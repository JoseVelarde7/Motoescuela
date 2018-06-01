<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Factura extends Model
{
    use Notifiable;
    protected $table='facturas';
    public $timestamps = false;
    protected $fillable=[
        'factura_numero','factura_fecha','factura_razon','factura_nit','factura_cantidad','factura_concepto','factura_monto','factura_total','factura_estado','pagos_id'
    ];
}
