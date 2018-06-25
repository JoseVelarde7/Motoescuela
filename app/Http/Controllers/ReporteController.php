<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReporteController extends Controller
{
    public function downloadPDF($ide)
    {
        $resp1 = DB::table('teoria')
            ->join('alumnos', 'alumnos.id', '=', 'teoria.alumno_id')
            ->select('teoria.*', 'alumno_nombre')
            ->where('teoria.id', $ide)
            ->get();
        $respuestas = DB::table('opciones')->get();
        $preguntas = DB::table('preguntas')->get();


        $pdf = PDF::loadView('pdf.pdfView',compact('resp1','preguntas','respuestas'));

        return $pdf->download('invoice.pdf');

    }

    public function usuarioPDF(){
        $usuarios = DB::table('users')->get();
        $pdf = PDF::loadView('pdf.usersView',compact('usuarios'));
        return $pdf->download('usuarios.pdf');
    }
}
