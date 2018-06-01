<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(){

        $credentials=$this->validate(request(),[
            'user_user' => 'required',
            'password' => 'required'
        ],[
            'user_user.required'=>'Usuario es obligatorio',
            'password.required'=>'Password obligatorio',
        ]);

        /*$auth=Auth::attempt(['user_user' => request()->user_user, 'password' => request()->password]);

        dd($auth);*/

        if(Auth::attempt(['user_user' => request()->user_user, 'password' => request()->password])){
            return redirect()->route('inicio');
        }
        return back()->withErrors(['user_user'=>'No Coinciden con Nuestros Registros']);

    }

    public function salir(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function inicio(){
        return view('auth.inicio');
    }

    public function generar(){
        $curso = DB::table('cursos')
            ->select('curso_nombre','id')
            ->where('curso_estado','=',1)
            ->get();
        $usuarios = DB::table('users')->count();
        $alumnos = DB::table('alumnos')->count();
        return response()->json([$curso,$usuarios,$alumnos]);
    }
}
