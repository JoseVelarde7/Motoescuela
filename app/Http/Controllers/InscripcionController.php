<?php

namespace App\Http\Controllers;

use App\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscripcionController extends Controller
{
    public function index(){
        /*$inscripcion=Inscripcion::all();
        return view('inscripciones.lista',compact('inscripcion'));*/
        $inscripcion = DB::table('inscripcones')
            ->join('alumnos', 'alumnos.id', '=', 'inscripcones.alumno_id')
            ->join('cursos', 'cursos.id', '=', 'inscripcones.curso_id')
            ->select('inscripcones.*', 'alumno_nombre','curso_nombre')
            ->get();
        return view('inscripciones.lista',compact('inscripcion'));
    }
    public function create(){
        $cursos = DB::table('cursos')
            ->join('horarios', 'horarios.id', '=', 'cursos.horario_id')
            ->select('cursos.*', 'horario_entrada','horario_salida')
            ->get();
        return view('inscripciones.crear',compact('cursos'));
    }
    public function store(){
        $now = new \DateTime();
        $data=request()->all();
        Inscripcion::create([
            'ins_fecha' => $now->format('Y-m-d'),
            'ins_obs' => $data['obs'],
            'alumno_id' => $data['alumno'],
            'curso_id' => $data['curso2']
        ]);

        DB::table('cursos')
            ->where('id', $data['curso2'])
            ->increment('curso_estudiantes');
        return redirect()->route('inscripcion.index');
    }
    public function buscar($id){
        $inscripcion=Inscripcion::findOrFail($id);
        return response()->json($inscripcion);
    }

    public function update(Request $request, $id, $cu){
        $inscripcion=Inscripcion::findOrFail($id);
        $inscripcion->update([
            'ins_obs' => $request->input("obs2"),
            'alumno_id' => $request->input("alumno2"),
            'curso_id' => $request->input("curso2")
        ]);
        DB::table('cursos')
            ->where('id', $cu)
            ->decrement('curso_estudiantes');
        DB::table('cursos')
            ->where('id',$request->input("curso2"))
            ->increment('curso_estudiantes');
        return response()->json(["mensaje"=>"Inscripcion modificada"]);
    }

    public function destroy($id,$cu){
        $inscripcion=Inscripcion::findOrFail($id);
        $inscripcion->delete();
        DB::table('cursos')
            ->where('id',$cu)
            ->decrement('curso_estudiantes');
        return response()->json(["mensaje"=>"borrado"]);
        //return redirect()->route('alumnos.index');
    }

}
