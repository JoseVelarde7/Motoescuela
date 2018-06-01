<?php

namespace App\Http\Controllers;

use App\Moto;
use Illuminate\Http\Request;

class MotoController extends Controller
{
    public function index(){
        $moto=Moto::all();
        return view('motos.lista',compact('moto'));
    }

    public function create(){
        return view('motos.crear');
    }

    public function store(){
        $data=request()->validate([
            'marca'=>'required',
            'tipo'=>'required',
            'modelo'=>['required','numeric'],
            'placa'=>['required','unique:motos,moto_placa'],
            'color'=>'required',
            'obs'=>'required',
            'file'=>'nullable'
        ],[
            'marca.required'=>'El Campo marca es obligatorio',
            'tipo.required'=>'El Campo tipo es obligatorio',
            'placa.required'=>'El Campo placa es obligatorio',
            'placa.unique'=>'El numero de placa ya existe',
            'color.required'=>'El Campo color es obligatorio',
            'obs.required'=>'Las Observaciones son obligatorias'
        ]);

        if(empty($data['file'])){
            Moto::create([
                'moto_marca' => $data['marca'],
                'moto_tipo' => $data['tipo'],
                'moto_modelo' => $data['modelo'],
                'moto_placa' => $data['placa'],
                'moto_color' => $data['color'],
                'moto_observacion' => $data['obs'],
                'moto_foto' => "moto1.jpg"
            ]);
        }else{
            $file=$data['file'];
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));
            Moto::create([
                'moto_marca' => $data['marca'],
                'moto_tipo' => $data['tipo'],
                'moto_modelo' => $data['modelo'],
                'moto_placa' => $data['placa'],
                'moto_color' => $data['color'],
                'moto_observacion' => $data['obs'],
                'moto_foto' => $nombre
            ]);
        }
        return redirect()->route('moto.index');
    }

    public function show(Moto $moto){
        return view('motos.show',compact('moto'));
    }

    public function edit(Moto $moto){
        return view('motos.editar',compact('moto'));
    }

    public function update(Moto $moto){
        $data=request()->all();

        if(empty($data['file'])){
            $moto->update([
                'moto_marca' => $data['marca'],
                'moto_tipo' => $data['tipo'],
                'moto_modelo' => $data['modelo'],
                'moto_placa' => $data['placa'],
                'moto_color' => $data['color'],
                'moto_observacion' => $data['obs'],
                'moto_foto' => $data['nfoto']
            ]);
        }else{
            $file=$data['file'];
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));
            \Storage::delete($data['nfoto']);
            $moto->update([
                'moto_marca' => $data['marca'],
                'moto_tipo' => $data['tipo'],
                'moto_modelo' => $data['modelo'],
                'moto_placa' => $data['placa'],
                'moto_color' => $data['color'],
                'moto_observacion' => $data['obs'],
                'moto_foto' => $nombre
            ]);
        }
        return redirect()->route('moto.show',['moto' => $moto]);
    }

    public function destroy($id){
        $moto=Moto::findOrFail($id);
        $moto->delete();
        return response()->json(["mensaje"=>"borrado"]);
        //return redirect()->route('alumnos.index');
    }
}

