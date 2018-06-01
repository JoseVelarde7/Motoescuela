<?php
namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function index(){
        /*$curso=Curso::all();
        return view('cursos.lista',compact('curso'));*/
        $curso = DB::table('cursos')
            ->join('horarios', 'horarios.id', '=', 'cursos.horario_id')
            ->select('cursos.*', 'horario_entrada','horario_salida')
            ->get();
        return view('cursos.lista',compact('curso'));
    }

    public function generar($id){
        /*$curso = DB::table('cursos')
            ->join('horarios', 'horarios.id', '=', 'cursos.horario_id')
            ->select('cursos.*', 'horario_entrada','horario_salida')
            ->get();*/
        $curso = DB::table('cursos')
            ->join('horarios', 'horarios.id', '=', 'cursos.horario_id')
            ->join('motos', 'motos.id', '=', 'cursos.moto_id')
            ->join('users', 'users.id', '=', 'cursos.user_id')
            ->select('cursos.*', 'horario_entrada','horario_salida','horario_dias','moto_foto','moto_marca','user_nombre','user_foto')
            ->where('cursos.id', $id)
            ->get();
        return response()->json($curso);
    }

    public function generar2(){
        $curso=Curso::all();
        return response()->json($curso);
    }

    public function mostrar(){
        /*$curso=Curso::all();
        return view('cursos.lista',compact('curso'));*/
        /*$horarios = DB::table('horarios')->get();*/
        return view('cursos.horario',compact('horarios'));
    }

    public function moto(){
        $moto = DB::table('motos')->get();
        return response()->json($moto);
    }

    public function horario(){
        $horario = DB::table('horarios')->get();
        return response()->json($horario);
    }

    public function create(Request $request){
        Curso::create([
            'curso_nombre' => $request->input("nombre"),
            'curso_estudiantes' => "0",
            'curso_observacion' => $request->input("obs"),
            'curso_estado' => 1,
            'moto_id' => $request->input("smotos"),
            'horario_id' => $request->input("horario"),
            'user_id' => $request->input("usuario")
        ]);
        return response()->json(["mensaje"=>"curso creado"]);
    }

    public function show($id){

        $cursos = DB::table('cursos')
            ->join('horarios', 'horarios.id', '=', 'cursos.horario_id')
            ->join('motos', 'motos.id', '=', 'cursos.moto_id')
            ->join('users', 'users.id', '=', 'cursos.user_id')
            ->select('cursos.*', 'horario_entrada','horario_salida','horario_dias','moto_foto','moto_marca','user_nombre','user_foto')
            ->where('cursos.id', $id)
            ->get();
        $alumnos=DB::table('inscripcones')
            ->join('alumnos','alumnos.id','=','inscripcones.alumno_id')
            ->select('inscripcones.id','alumno_nombre')
            ->where('curso_id',$id)->get();
        return view('cursos.show',compact('cursos','alumnos'));
    }

    public function buscar($id){
        $curso=Curso::findOrFail($id);
        return response()->json($curso);
    }

    public function update(Request $request, $id){
        $curso=Curso::findOrFail($id);
        $curso->update([
            'curso_nombre' => $request->input("nombre2"),
            'curso_observacion' => $request->input("obs2"),
            'moto_id' => $request->input("smotos2"),
            'horario_id' => $request->input("horario2"),
            'user_id' => $request->input("usuario2")
        ]);
        return response()->json(["mensaje"=>"curso modificado"]);
    }

    public function destroy($id){
        $curso=Curso::findOrFail($id);
        $curso->delete();
        return response()->json(["mensaje"=>"borrado"]);
        //return redirect()->route('alumnos.index');
    }
    public function estado($id){
        $curso=Curso::findOrFail($id);
        $curso->update([
            'curso_estado' => 0
        ]);
        return response()->json(["mensaje"=>"Anulada"]);
        //return redirect()->route('alumnos.index');
    }
}
