<?php

namespace App\Http\Controllers;

use App\Examen;
use App\Teoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeoriaController extends Controller
{
    public function index(){
        $resultado="";
        return view('teoria.ingreso',compact('resultado'));
    }

    public function store(){
        $data=request()->all();
        $data2=$data;
        unset($data2['_token']);
        unset($data2['ide']);
        $now = new \DateTime();
        //$cadena = json_encode($data2);
        $cadena=implode(",", $data2);
        $resultado=Teoria::create([
            'teoria_fecha' => $now->format('Y-m-d'),
            'teoria_respuestas' => $cadena,
            'alumno_id' => $data['ide'],
        ]);
        //return redirect()->route('teoria.index',compact('resultado'));
        return view('teoria.ingreso',compact('resultado'));
    }

    public function validar(Request $request){

        $consulta= DB::table('alumnos')
            ->select('id', 'alumno_nombre')
            ->where([
                ['alumno_nombre', '=', $request->input("nombre")],
                ['alumno_ci', '=', $request->input("carnet")],
            ])
            ->get();
        if(empty($consulta[0]->alumno_nombre)){
            return back();
        }else{
            $alumnos=DB::table('alumnos')
                ->join('teoria','alumnos.id','=','teoria.alumno_id')
                ->select('teoria_fecha','alumno_nombre')
                ->where('alumno_ci',$request->input('carnet'))->get();
            if(empty($alumnos[0]->teoria_fecha)){
                $nombre=$request->input("nombre");
                $id=$consulta[0]->id;
                $preguntas=Examen::all();
                $respuestas = DB::table('opciones')->get();
                return view('examenes.examen',compact('preguntas','respuestas','nombre','id'));
            }else{
                return back();
            }
        }
    }

}
