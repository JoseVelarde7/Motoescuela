<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        $user=User::all();
        return view('users.lista',compact('user'));
    }
    public function create(){
        return view('users.crear');
    }

    public function store(){
        $data=request()->validate([
            'nombre'=>['required','alpha_spaces'],
            'ci'=>'required',
            'ext'=>'nullable',
            'direccion'=>'required',
            'celular'=>['required','numeric'],
            'cargo'=>'required',
            'tipo'=>'required',
            'user'=>['required',Rule::unique('users','user_user')],
            'pass'=>'required',
            'file'=>'nullable'
        ],[
            'nombre.required'=>'El nombre es obligatorio',
            'nombre.alpha_spaces'=>'El nombre no puede contener números',
            'ci.required'=>'El CI es obligatorio',
            'direccion.required'=>'la direccion es obligatorio',
            'celular.required'=>'celular es obligatorio',
            'celular.numeric'=>'celular solo debe tener numeros',
            'cargo.required'=>'El Cargo obligatorio',
            'tipo.required'=>'el tipo obligatorias',
            'user.required'=>'el user son obligatorias',
            'user.unique'=>'Ya existe un Usuario con ese nombre',
            'pass.required'=>'el pass son obligatorias'
        ]);
        //$data=request()->all();
        if(empty($data['file'])){
            User::create([
                'user_nombre' => $data['nombre'],
                'user_ci' => $data['ci']." ".$data['ext'],
                'user_direccion' => $data['direccion'],
                'user_celular' => $data['celular'],
                'user_cargo' => $data['cargo'],
                'user_tipo' => $data['tipo'],
                'user_user' => $data['user'],
                'password' => bcrypt($data['pass']),
                'user_foto' => ""
            ]);
        }else{
            $file=$data['file'];
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));
            User::create([
                'user_nombre' => $data['nombre'],
                'user_ci' => $data['ci']." ".$data['ext'],
                'user_direccion' => $data['direccion'],
                'user_celular' => $data['celular'],
                'user_cargo' => $data['cargo'],
                'user_tipo' => $data['tipo'],
                'user_user' => $data['user'],
                'password' => bcrypt($data['pass']),
                'user_foto' => $nombre
            ]);
        }
        return redirect()->route('user.index');
    }

    public function show($id){
        $user=User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id){
        $user=User::find($id);
        return view('users.editar',compact('user'));
    }

    public function update($id){
        $data=request()->all();
        if(empty($data['file'])){
            User::find($id)->update([
                'user_nombre' => $data['nombre'],
                'user_ci' => $data['ci']." ".$data['ext'],
                'user_direccion' => $data['direccion'],
                'user_celular' => $data['celular'],
                'user_cargo' => $data['cargo'],
                'user_tipo' => $data['tipo'],
                'user_user' => $data['user'],
                'password' => bcrypt($data['pass']),
            ]);
        }else{
            $file=$data['file'];
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));
            \Storage::delete($data['nfoto']);
            User::find($id)->update([
                'user_nombre' => $data['nombre'],
                'user_ci' => $data['ci']." ".$data['ext'],
                'user_direccion' => $data['direccion'],
                'user_celular' => $data['celular'],
                'user_cargo' => $data['cargo'],
                'user_tipo' => $data['tipo'],
                'user_user' => $data['user'],
                'password' => bcrypt($data['pass']),
                'user_foto' => $nombre
            ]);
        }

        return redirect()->route('usuario.show',['usuario' => $id]);
    }

    public function destroy($id){
        $user=User::findOrFail($id);
        \Storage::delete($user->usuario_foto);
        $user->delete();
        return response()->json(["mensaje"=>"borrado"]);
        //return redirect()->route('alumnos.index');
    }

    public function generar(){
        $user=User::all();
        return response()->json($user);
    }

    function entrada($usuario,$pass){
        $user = DB::select('select id FROM users WHERE id = ? AND user_ci=?', [$usuario,$pass]);
        return response()->json($user);
    }

    function salida($usuario,$pass){
        $user = DB::select('select id FROM users WHERE id = ? AND user_ci=?', [$usuario,$pass]);
        if ($user==[]){
            $respuesta="vacio";
        }else{
            $user2 = DB::select('select id FROM asistencias WHERE asistencia_fecha = CURDATE() AND user_id=?', [$usuario]);
            if ($user2==[]){
                $respuesta="entrada";
            }else{
                $respuesta=$user2[0]->id;
            }
        }
        return response()->json($respuesta);
    }
}
