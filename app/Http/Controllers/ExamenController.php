<?php

namespace App\Http\Controllers;

use App\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamenController extends Controller
{

    public function index(){
        return view('examenes.index');
    }

    public function create(){
        $preguntas=Examen::all();
        return view('examenes.crear',compact('preguntas'));
    }

    public function examen(){
        $preguntas=Examen::all();
        $respuestas = DB::table('opciones')->get();
        return view('examenes.examen',compact('preguntas','respuestas'));
    }

    public function soluciones(){
        $soluciones=DB::table('opciones')->get();
        return response()->json($soluciones);
    }

    public function resultado(){
        $respuestas = DB::table('teoria')
            ->join('alumnos', 'alumnos.id', '=', 'teoria.alumno_id')
            ->select('teoria.*', 'alumno_nombre')
            ->get();
        return view('examenes.resultados',compact('respuestas'));
    }

    public function calificacion($id){
        $resp1 = DB::table('teoria')
            ->join('alumnos', 'alumnos.id', '=', 'teoria.alumno_id')
            ->select('teoria.*', 'alumno_nombre')
            ->where('teoria.id', $id)
            ->get();
        $respuestas = DB::table('opciones')->get();
        $preguntas = DB::table('preguntas')->get();
        return view('examenes.calificacion',compact('resp1','preguntas','respuestas'));
    }

    public function edit($id){
        $preguntas = DB::table('preguntas')->where('preguntas.id', $id)->get();
        $respuestas=DB::table('opciones')->where('opciones.preguntas_id',$id)->get();
        return view('examenes.editar',compact('preguntas','respuestas'));
    }

    public function store(){
        $data=request()->all();
        if(empty($data['file'])){
            $examen=Examen::create([
                'pregunta_pregunta' => $data['pregunta'],
                'pregunta_foto' => ""
            ]);
        }else{
            $file=$data['file'];
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));
            $examen=Examen::create([
                'pregunta_pregunta' => $data['pregunta'],
                'pregunta_foto' => $nombre
            ]);
        }
        $opciones=$data['opciones'];
        return view('examenes.opciones',compact('examen','opciones'));
    }

    public function registrar(){
        $data=request()->all();
        for ($i=1;$i<=$data['op'];$i++){
            if(empty($data['file'.$i])){
                DB::table('opciones')->insert([
                    'opcion_pregunta' => $data['q'.$i],
                    'opcion_foto' => "",
                    'opcion_respuesta' => $data['estado'.$i],
                    'preguntas_id' => $data['codigo']
                ]);
            }else{
                $file=$data['file'.$i];
                $nombre = $file->getClientOriginalName();
                \Storage::disk('local')->put($nombre,  \File::get($file));
                DB::table('opciones')->insert([
                    'opcion_pregunta' => $data['q'.$i],
                    'opcion_foto' => $nombre,
                    'opcion_respuesta' => $data['estado'.$i],
                    'preguntas_id' => $data['codigo']
                ]);
            }
        };
        return redirect()->route('examen.create');
    }

    public function pregunta($id){
        $pregunta = DB::table('opciones')
            ->where('preguntas_id', $id)
            ->get();
        return response()->json($pregunta);
    }

    public function update(Request $request, $id){
        $pregunta=Examen::findOrFail($id);
        $i=1;
        if(empty($request['file'])){
            $pregunta->update([
                'pregunta_pregunta' => $request['pregunta']
            ]);
            while(!empty($request['respuesta'.$i])){
                DB::table('opciones')->where('id', $request['ide'.$i])
                    ->update([
                        'opcion_pregunta' => $request['respuesta'.$i],
                        'opcion_respuesta' => $request['valor'.$i]
                    ]);
                $i++;
            }
        }else{
            $file=$request['file'];
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));
            \Storage::delete($request['vfoto']);
            $pregunta->update([
                'pregunta_pregunta' => $request['pregunta'],
                'pregunta_foto' => $nombre
            ]);
            while(!empty($request['respuesta'.$i])){
                DB::table('opciones')->where('id', $request['ide'.$i])
                    ->update([
                        'opcion_pregunta' => $request['respuesta'.$i],
                        'opcion_respuesta' => $request['valor'.$i]
                    ]);
                $i++;
            }
        }
        return redirect()->route('examen.create');
    }

    public function destroy($id){
        DB::table('opciones')->where('preguntas_id', '=', $id)->delete();
        $examen=Examen::findOrFail($id);
        \Storage::delete($examen->pregunta_foto);
        $examen->delete();
        return response()->json(["mensaje"=>"borrado"]);
        //return redirect()->route('alumnos.index');
    }
}
