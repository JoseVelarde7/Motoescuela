<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AlumnoController extends Controller
{
    public function index(){
        $alumnos=Alumno::all();
        return view('alumnos.lista',compact('alumnos'));
    }

    public function show($id){
        $alumno=Alumno::find($id);
        return view('alumnos.show',compact('alumno'));
    }

    public function create(){
        return view('alumnos.crear');
    }

    public function store(){
        $data=request()->validate([
            'nombre'=>['required','alpha_spaces'],
            'celular'=>['required','numeric'],
            'direccion'=>'required',
            'ci'=>['required','unique:alumnos,alumno_ci'],
            'ext'=>'nullable',
            'estado'=>'required'
        ],[
            'nombre.required'=>'El Campo Nombre es obligatorio',
            'nombre.alpha_spaces'=>'El Nombre solo puede tener letras',
            'celular.required'=>'El Campo Celular es obligatorio',
            'celular.numeric'=>'El Campo Celular debe ser numerico',
            'direccion.required'=>'El Campo Direccion es obligatorio',
            'ci.required'=>'El Campo Ci es obligatorio',
            'ci.unique'=>'Ya existe un usuario con ese C.I.',
            'estado.required'=>'El Campo Estado es obligatorio'
        ]);

        Alumno::create([
            'alumno_nombre' => $data['nombre'],
            'alumno_celular' => $data['celular'],
            'alumno_direccion' => $data['direccion'],
            'alumno_ci' => $data['ci']." ".$data['ext'],
            'alumno_activo' => $data['estado']
        ]);

        return redirect()->route('alumnos.index');
    }

    public function edit($id){
        $alumno=Alumno::find($id);
        return view('alumnos.editar',compact('alumno'));
    }

    public function update($id){
        $data=request()->validate([
            'nombre'=>'required',
            'celular'=>['required','numeric'],
            'direccion'=>'required',
            'ci'=>['required',Rule::unique('alumnos','alumno_ci')->ignore($id)],
            'ext'=>'nullable',
            'estado'=>'required'
        ],[
            'nombre.required'=>'El Campo Nombre es obligatorio',
            'celular.required'=>'El Campo Celular es obligatorio',
            'celular.numeric'=>'El Campo Celular debe ser numerico',
            'direccion.required'=>'El Campo Direccion es obligatorio',
            'ci.required'=>'El Campo Ci es obligatorio',
            'ci.unique'=>'Ya existe un usuario con ese C.I.',
            'estado.required'=>'El Campo Estado es obligatorio'
        ]);
        Alumno::find($id)->update([
            'alumno_nombre' => $data['nombre'],
            'alumno_celular' => $data['celular'],
            'alumno_direccion' => $data['direccion'],
            'alumno_ci' => $data['ci']." ".$data['ext'],
            'alumno_activo' => $data['estado']
        ]);
        return redirect()->route('alumnos.show',['alumno' => $id]);
    }

    public function  destroy($id){
        $alumno=Alumno::findOrFail($id);
        $alumno->delete();
        return response()->json(["mensaje"=>"borrado"]);
        //return redirect()->route('alumnos.index');
    }

    public function generar(){
        $alumnos=Alumno::all();
        return response()->json($alumnos);
    }

    public function generardos(){
        $alumnos = DB::table('alumnos')
            ->leftJoin('inscripcones', 'alumnos.id', '=', 'inscripcones.alumno_id')
            ->select('alumnos.*')
            ->whereNull('inscripcones.alumno_id')
            ->get();
        return response()->json($alumnos);
    }
}
