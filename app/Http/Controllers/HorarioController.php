<?php

namespace App\Http\Controllers;

use App\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    public function index(){
        return view('horarios.show');
    }

    public function nuevo(){
        $horario=Horario::all();
        return view('horarios.lista',compact('horario'));
    }

    public function create(){
        return view('horarios.crear');
    }

    public function instructor(){
        return view('horarios.instructor');
    }

    public function general(){
        $cursos = DB::table('inscripcones')
            ->join('horarios', 'horarios.id', '=', 'inscripcones.horario_id')
            ->join('users', 'users.id', '=', 'inscripcones.user_id')
            ->select('inscripcones.*', 'horario_nombre','user_nombre')
            ->where('inscripcion_estado','=',1)
            ->get();
        return view('horarios.general',compact('cursos'));
    }

    public function store(){
        $data=request()->validate([
            'nombre'=>['required','unique:horarios,horario_nombre'],
            'entrada'=>'required',
            'salida'=>'required',
            'dias'=>'required',
            'tipo'=>'required'
        ],[
            'nombre.required'=>'El Campo Nombre es obligatorio',
            'nombre.unique'=>'Ya existe un horario con ese nombre',
            'entrada.required'=>'El Campo entrada es obligatorio',
            'salida.required'=>'El Campo salida debe ser numerico',
            'dias.required'=>'El Campo dias es obligatorio',
            'tipo.required'=>'El Campo tipo es obligatorio'
        ]);

        Horario::create([
            'horario_nombre' => $data['nombre'],
            'horario_entrada' => $data['entrada'],
            'horario_salida' => $data['salida'],
            'horario_dias' => $data['dias'],
            'horario_tipo' => $data['tipo']
        ]);

        return redirect()->route('horario.index');
    }

    public function edit(Horario $horario){
        return view('horarios.editar',compact('horario'));
    }

    public function consulta1($id){
        $curso = DB::table('inscripcones')
            ->join('horarios', 'horarios.id', '=', 'inscripcones.horario_id')
            ->join('users', 'users.id', '=', 'inscripcones.user_id')
            ->join('alumnos', 'alumnos.id', '=', 'inscripcones.alumno_id')
            ->select('inscripcones.*', 'horario_nombre','user_nombre','alumno_nombre')
            ->where([['inscripcones.user_id', $id],['inscripcones.inscripcion_estado',1]])
            ->get();
        return response()->json($curso);
    }

    public function update(Horario $horario){
        $data=request()->all();
        /*$data=request()->validate([
            'nombre'=>'required',
            'celular'=>['required','numeric'],
            'direccion'=>'required',
            'ci'=>['required',Rule::unique('alumnos','alumno_ci')->ignore($id)],
            'estado'=>'required'
        ],[
            'nombre.required'=>'El Campo Nombre es obligatorio',
            'celular.required'=>'El Campo Celular es obligatorio',
            'celular.numeric'=>'El Campo Celular debe ser numerico',
            'direccion.required'=>'El Campo Direccion es obligatorio',
            'ci.required'=>'El Campo Ci es obligatorio',
            'ci.unique'=>'Ya existe un usuario con ese C.I.',
            'estado.required'=>'El Campo Estado es obligatorio'
        ]);*/
        $horario->update([
            'horario_nombre' => $data['nombre'],
            'horario_entrada' => $data['entrada'],
            'horario_salida' => $data['salida'],
            'horario_dias' => $data['dias'],
            'horario_tipo' => $data['tipo']
        ]);
        return redirect()->route('horario.index');
    }

    public function destroy($id){
        $horario=Horario::findOrFail($id);
        $horario->delete();
        return response()->json(["mensaje"=>"borrado"]);
        //return redirect()->route('alumnos.index');
    }

    public function validar($usuario,$horario){
        $curso = DB::table('cursos')
            ->select('curso_nombre')
            ->where([['cursos.user_id', $usuario],['cursos.horario_id',$horario],['cursos.curso_estado',1]])
            ->get();
        return response()->json($curso);
    }
}
