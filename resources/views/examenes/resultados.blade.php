@extends('layout2')
@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
@endsection
@section('barra')
    <li><a href="#" class="md-trigger" data-modal="modal-1">CREAR PREGUNTA</a></li>
@endsection
@section('content')

    <div align="center">
        <h1>Resultados de los Exámenes</h1>
    </div>
    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
        <thead>
        <tr>
            <td class="sortable-column sort-asc" style="width: 100px">Número</td>
            <td class="sortable-column">Fecha</td>
            <td>Alumno</td>
            <td>Operaciones</td>
        </tr>
        </thead>
        <tbody id="tab1">
        @forelse($respuestas as $respuesta)
            <tr>
                <td>{{$respuesta->id}}</td>
                <td>{{$respuesta->teoria_fecha}}</td>
                <td>{{$respuesta->alumno_nombre}}</td>
                <td style="padding: 0;">
                    {!! csrf_field() !!}
                    <button class="button primary md-trigger" onclick="mostrar2({{$respuesta->id}},'{{$respuesta->teoria_respuestas}}')"><span class="icon mif-info"></span></button>
                    {{--<button type="button" class="button danger" onclick='confirmar({{$respuesta->id}})'><span class="icon mif-cancel"></span></button>--}}
                </td>
            </tr>
        @empty
            <h1>error</h1>
        @endforelse
        </tbody>
    </table>
    <br><br>
    <div class="place-right"><a href="{{url('/examenes')}}" class="button fg-white danger">Regresar</a></div>

@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/examen.js')}}"></script>
@endsection