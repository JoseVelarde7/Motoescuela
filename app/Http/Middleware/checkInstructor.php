<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class checkInstructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $data=request()->all();
        $ins="";

        $usu = DB::table('inscripcones')
            ->where([
                ['inscripcion_estado', '1'],
                ['user_id',$data['usuario']],
                ['horario_id',$data['horario']]
            ])->get()->toArray();
        $mot = DB::table('inscripcones')
        ->Where([
                ['inscripcion_estado', '1'],
                ['moto_id',$data['smotos']],
                ['horario_id',$data['horario']]
            ])
            ->get()->toArray();

        if (!empty($usu)){
            $ins=$ins." El usuario ya tiene ese horario";
        }
        if(!empty($mot)){
            $ins=$ins." La moto ya tiene ese horario";
        }
        if(empty($ins))
            return $next($request);
        else{
            return back()->withInput();
        }
    }
}
