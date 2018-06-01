<?php

namespace App\Http\Controllers;

use App\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsistenciaController extends Controller
{
    public function index(){
        /*$asistencia=Asistencia::all();
        return view('asistencias.lista',compact('asistencia'));*/

        $asistencias = DB::table('asistencias')
            ->join('users', 'users.id', '=', 'asistencias.user_id')
            ->select('asistencias.*', 'user_nombre')
            ->get();
        return view('asistencias.lista',compact('asistencias'));
    }

    public function marcar(){
        //$asistencia=Asistencia::all();
        return view('asistencias.marcar');
    }

    public function create(Request $request){
        $now = new \DateTime();
        Asistencia::create([
            'asistencia_fecha' => $now->format('Y-m-d'),
            'asistencia_entrada' => $now->format('H:i:s'),
            'asistencia_salida' => null,
            'user_id' => $request->input("user")
        ]);
        return response()->json(["mensaje"=>"exito"]);
        //return response()->json($now);
    }

    public function modificar($id){
        $now = new \DateTime();
        Asistencia::find($id)->update([
            'asistencia_salida' => $now->format('H:i:s')
        ]);
        return response()->json(["mensaje"=>"exito"]);
        //return response()->json($now);
    }
}
