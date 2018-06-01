<?php

namespace App\Http\Controllers;

use App\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index(){
        $pago=Pago::all();
        return view('pagos.lista',compact('pago'));
    }

    public function create(){
        return view('pagos.crear');
    }
}
