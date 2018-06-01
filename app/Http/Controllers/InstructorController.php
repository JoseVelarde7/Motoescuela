<?php

namespace App\Http\Controllers;

use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class InstructorController extends Controller
{
    public function index(){
        $instructor=Instructor::all();
        return view('instructores.lista',compact('instructor'));
    }
    public function create(){
        return view('instructores.crear');
    }

    public function store(){
        $data=request()->validate([
            'nombre'=>'required',
            'celular'=>['required','numeric'],
            'direccion'=>'required',
            'ci'=>['required','unique:alumnos,alumno_ci'],
            'file'=>'required',
            'obs'=>''
        ],[
            'nombre.required'=>'El Campo Nombre es obligatorio',
            'celular.required'=>'El Campo Celular es obligatorio',
            'celular.numeric'=>'El Campo Celular debe ser numerico',
            'direccion.required'=>'El Campo Direccion es obligatorio',
            'ci.required'=>'El Campo Ci es obligatorio',
            'ci.unique'=>'Ya existe un usuario con ese C.I.',
            'file.required'=>'Necesita cargar una foto'
        ]);

        //$data=request()->all();

        $file=$data['file'];
        $nombre = $file->getClientOriginalName();

        \Storage::disk('local')->put($nombre,  \File::get($file));

        Instructor::create([
            'inst_nombre' => $data['nombre'],
            'inst_celular' => $data['celular'],
            'inst_direccion' => $data['direccion'],
            'inst_ci' => $data['ci'],
            'inst_foto' => $nombre,
            'inst_observacion' => $data['obs']
        ]);
        return redirect()->route('instructor.index');
    }

    public function show(Instructor $instructor){
        //$alumno=Alumno::find($id);
        return view('instructores.show',compact('instructor'));
    }
    public function edit(Instructor $instructor){
        //$alumno=Alumno::find($id);
        return view('instructores.editar',compact('instructor'));
    }

    public function update(Instructor $instructor){
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

        if(empty($data['file'])){
            $instructor->update([
                'inst_nombre' => $data['nombre'],
                'inst_celular' => $data['celular'],
                'inst_direccion' => $data['direccion'],
                'inst_ci' => $data['ci'],
                'inst_foto' => $data['nfoto'],
                'inst_observacion' => $data['obs']
            ]);
        }else{
            $file=$data['file'];
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));
            \Storage::delete($data['nfoto']);
            $instructor->update([
                'inst_nombre' => $data['nombre'],
                'inst_celular' => $data['celular'],
                'inst_direccion' => $data['direccion'],
                'inst_ci' => $data['ci'],
                'inst_foto' => $nombre,
                'inst_observacion' => $data['obs']
            ]);
        }

        return redirect()->route('instructor.show',['instructor' => $instructor]);
    }

    public function destroy($id){
        $instructor=Instructor::findOrFail($id);
        \Storage::delete($instructor->inst_foto);
        $instructor->delete();
        return response()->json(["mensaje"=>"borrado"]);
        //return redirect()->route('alumnos.index');
    }
}
