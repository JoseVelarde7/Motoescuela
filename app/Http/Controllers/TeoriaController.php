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

    public function validacion(){
        $data=request()->all();
        $consulta= DB::table('alumnos')
            ->select('id', 'alumno_nombre')
            ->where([
                ['alumno_nombre', '=', $data['nombre']],
                ['alumno_ci', '=', $data['carnet']],
            ])->get();
        //return response()->json(["datos"=>$consulta]);
        if(empty($consulta[0]->alumno_nombre)){
            return response()->json(["datos"=>"600"]);
        }else{
            $alumnos=DB::table('alumnos')
                ->join('teoria','alumnos.id','=','teoria.alumno_id')
                ->select('teoria_fecha','alumno_nombre')
                ->where('alumno_ci',$data['carnet'])->get();
            if(empty($alumnos[0]->teoria_fecha)){
                $nombre=$data['nombre'];
                $id=$consulta[0]->id;
                $preguntas=Examen::all();
                $respuestas = DB::table('opciones')->get();
                //return view('examenes.examen',compact('preguntas','respuestas','nombre','id'));
                //return redirect('dashboard')->with('status', 'Profile updated!');
                //return redirect('/examenes/examen')->with($nombre, 'preguntas', 'respuestas','id');
                //return redirect()->route('examen.examen')->with([$nombre]);
                $r[]=$nombre;
                $r[]=$id;
                $r[]=$preguntas;
                $r[]=$respuestas;
                return response()->json(["datos"=>$r]);
            }else{
                return response()->json(["datos"=>"602"]);
            }
        }
    }

    public function examen(){
        $resultado="";
        return view('teoria.ingreso',compact('resultado'));
    }

}
