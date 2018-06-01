@extends('layout')

@section('content')

    <h1 class="text-light">Alumno {{$alumno->alumno_nombre}}<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">

    <h2>Celular: {{$alumno->alumno_celular}}</h2>
    <h2>Direccion: {{$alumno->alumno_direccion}}</h2>
    <h2>Carnet: {{$alumno->alumno_ci}}</h2>
    <h2>Estado: {{$alumno->alumno_activo}}</h2>

    <br><br>
    <a href="{{ url('/alumnos/') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>


@endsection