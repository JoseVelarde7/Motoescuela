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
    public function alumnoPDF(){
        $alumnos = DB::table('alumnos')->get();
        $pdf = PDF::loadView('pdf.alumnosView',compact('alumnos'));
        return $pdf->download('alumnos.pdf');
    }
    public function motosPDF(){
        $motos = DB::table('motos')->get();
        $pdf = PDF::loadView('pdf.motosView',compact('motos'));
        return $pdf->download('motos.pdf');
    }
    public function horariosPDF(){
        $horarios = DB::table('horarios')->get();
        $pdf = PDF::loadView('pdf.horariosView',compact('horarios'));
        return $pdf->download('horarios.pdf');
    }
    public function inscripcionesPDF(){
        $inscripciones = DB::table('inscripcones')
            ->join('alumnos', 'alumnos.id', '=', 'inscripcones.alumno_id')
            ->select('inscripcones.*', 'alumno_nombre')
            ->get();
        $pdf = PDF::loadView('pdf.inscripcionesView',compact('inscripciones'));
        return $pdf->download('inscripciones.pdf');
    }
}
