@extends('layout')
@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
@endsection
@section('content')

    <h1 class="text-light">Inscripciones<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <a class="button primary" href="{{url('inscripciones/crear')}}"><span class="mif-plus"></span> Crear</a>
    <hr class="thin bg-grayLighter">
    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
        <thead>
        <tr>
            <td class="sortable-column sort-asc" style="width: 100px">ID</td>
            <td class="sortable-column">Fecha</td>
            <td class="sortable-column">Alumno</td>
            <td>Curso</td>
            <td>Operaciones</td>
        </tr>
        </thead>
        <tbody>
        @forelse($inscripcion as $inst)
            <tr>
                <td>{{$inst->id}}</td>
                <td>{{$inst->ins_fecha}}</td>
                <td>{{$inst->alumno_nombre}}</td>
                <td>{{$inst->curso_nombre}}</td>
                <td style="padding: 0px;">
                    {!! csrf_field() !!}
                    <button data-modal="modal-8" class="button success md-trigger" onclick="modificar({{$inst->id}})"><span class="icon mif-pencil"></span></button>
                    <button type="button" class="button danger" onclick='confirmar({{$inst->id}},{{$inst->curso_id}})'><span class="icon mif-cancel"></span></button>
                </td>
            </tr>
        @empty
            <h1>error</h1>
        @endforelse
        </tbody>
    </table>

    <div class="md-modal md-effect-7" id="modal-8">
        <div class="md-content" style="height: 400px;">
            <h3>Modificar Inscripcion</h3>
            <div class="cell">
                <form id="formulario2" method="POST">
                    {{method_field('PUT')}}
                    {!! csrf_field() !!}
                    <div class="cell">
                        <label for="alumno2">Alumno: </label>
                        <div class="input-control select full-size">
                            <select name="alumno2" id="alumno2"></select>
                        </div>
                    </div>

                    <div class="cell">
                        <label for="curso2">Curso: </label>
                        <div class="input-control select full-size">
                            <select name="curso2" id="curso2"></select>
                        </div>
                    </div>
                    <div class="cell">
                        <label for="obs2">Observaciones: </label>
                        <div class="input-control text full-size">
                            <input type="text" name="obs2" id="obs2">
                        </div>
                    </div>
                    <input type="text" name="ide" id="ide" style="display: none;">
                    <input type="text" name="cu" id="cu" style="display: none;">
                </form>
                <div class="place-left">
                    <a href="#" id="modificarins" class="button success">Modificar</a>
                </div>
                <div class="place-right">
                    <button class=" button danger md-close">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/inscripciones.js')}}"></script>
@endsection
