<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function index(){
        $facturas=Factura::all();
        return view('facturas.lista',compact('facturas'));
    }

    public function create(){
        return view('facturas.crear');
    }

    public function registrar(Request $request){
        $now = new \DateTime();

        $fac=Factura::all()->last();
        $ultimo=($fac->factura_numero)+1;

        $pago = Pago::create([
            'pago_monto' => $request->input("total"),
            'pago_saldo' => $request->input("saldo"),
            'alumno_id' => $request->input("alumno")
        ]);
        $factura = Factura::create([
            'factura_numero' =>$ultimo,
            'factura_fecha' =>$now->format('Y-m-d'),
            'factura_razon' => $request->input("nombrenit"),
            'factura_nit' => $request->input("nit"),
            'factura_cantidad' => $request->input("cantidad1"),
            'factura_concepto' => $request->input("concepto1"),
            'factura_monto' => $request->input("monto1"),
            'factura_total' => $request->input("total"),
            'factura_estado' => "Emitido",
            'pagos_id' => $pago->id
        ]);
        return response()->json($factura->id);
    }

    public function mostrar($id){
        $factura=Factura::find($id);
        return view('facturas.factura',compact('factura'));
    }

    public function destroy($id){
        $factura=Factura::findOrFail($id);
        $factura->update([
            'factura_estado' => "Anulado"
        ]);
        return response()->json(["mensaje"=>"Anulada"]);
        //return redirect()->route('alumnos.index');
    }
}
