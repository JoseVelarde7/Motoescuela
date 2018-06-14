<?php

namespace App\Http\Controllers;

use App\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscripcionController extends Controller
{
    public function index(){
        $inscripcion = DB::table('inscripcones')
            ->join('alumnos', 'alumnos.id', '=', 'inscripcones.alumno_id')
            ->select('inscripcones.*', 'alumno_nombre')
            ->get();
        return view('inscripciones.lista',compact('inscripcion'));
    }
    public function create(){
        return view('inscripciones.crear');
    }
    public function store(){
        $now = new \DateTime();
        $data=request()->all();
        Inscripcion::create([
            'ins_fecha' => $now->format('Y-m-d'),
            'ins_obs' => $data['obs'],
            'inscripcion_estado'=>"1",
            'alumno_id' => $data['alumno'],
            'moto_id' => $data['smotos'],
            'horario_id' => $data['horario'],
            'user_id' => $data['usuario']
        ]);
        return response()->json(["mensaje"=>"Inscripcion Creada"]);
        //return redirect()->route('inscripcion.index');
    }

    public function validar($usuario,$horario,$moto){
        $ins="";
        $usu = DB::table('inscripcones')
            ->where([
                ['inscripcion_estado', '1'],
                ['user_id',$usuario],
                ['horario_id',$horario]
            ])->get()->toArray();
        $mot = DB::table('inscripcones')
            ->Where([
                ['inscripcion_estado', '1'],
                ['moto_id',$moto],
                ['horario_id',$horario]
            ])
            ->get()->toArray();

        if (!empty($usu)){
            $ins=$ins." El usuario ya tiene ese horario";
        }
        if(!empty($mot)){
            $ins=$ins." La moto ya tiene ese horario";
        }
        if(empty($ins))
            return response()->json("correcto");
        else{
            return response()->json($ins);
        }
    }

    public function generar($id){
        $curso = DB::table('inscripcones')
            ->join('horarios', 'horarios.id', '=', 'inscripcones.horario_id')
            ->join('motos', 'motos.id', '=', 'inscripcones.moto_id')
            ->join('users', 'users.id', '=', 'inscripcones.user_id')
            ->join('alumnos','alumnos.id','=','inscripcones.alumno_id')
            ->select('inscripcones.*', 'horario_entrada','horario_salida','horario_dias','moto_foto','moto_marca','user_nombre','user_foto','alumno_nombre')
            ->where('inscripcones.id', $id)
            ->get();
        return response()->json($curso);
    }

    public function buscar($id){
        //$inscripcion=Inscripcion::findOrFail($id);
        $inscripcion = DB::table('inscripcones')
            ->join('alumnos', 'alumnos.id', '=', 'inscripcones.alumno_id')
            ->select('inscripcones.*', 'alumno_nombre')
            ->where('inscripcones.id', $id)
            ->get();
        return response()->json($inscripcion);
    }

    public function update(Request $request, $id){
        $inscripcion=Inscripcion::findOrFail($id);
        $inscripcion->update([
            'ins_obs' => $request->input("obs2"),
            'inscripcion_estado'=>$request->input("estado"),
            'moto_id' => $request->input("smotos2"),
            'horario_id' => $request->input("horario2"),
            'user_id' => $request->input("usuario2")
        ]);
        return response()->json(["mensaje"=>"Inscripcion modificada"]);
    }

    public function destroy($id){
        $inscripcion=Inscripcion::findOrFail($id);
        $inscripcion->delete();
        return response()->json(["mensaje"=>"borrado"]);
    }

}
