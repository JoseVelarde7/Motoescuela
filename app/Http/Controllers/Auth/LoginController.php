<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

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
        $curso = DB::table('inscripcones')
            ->join('alumnos', 'alumnos.id', '=', 'inscripcones.alumno_id')
            ->select('inscripcones.*', 'alumno_nombre')
            ->where('inscripcion_estado','=',1)
            ->get();
        $usuarios = DB::table('users')->count();
        $alumnos = DB::table('alumnos')->count();
        $motos = DB::table('motos')->count();
        return response()->json([$usuarios,$alumnos,$motos,$curso]);
    }

    /*protected function sendLoginResponse(Request $request){
        $request->session()->regenerate();
        $previous_session=Auth::User()->session_id;
        if($previous_session){
            \Session::getHandler()->destroy($previous_session);
        }
        Auth::user()->session_id=\Session::getId();
        Auth::user()->save();
        $this->clearLoginAttempts($request);
        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }*/
}
