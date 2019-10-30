@extends('layout')
@section('content')

    <h1 class="text-light">Horarios<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <a class="button primary" href="{{url('horarios/crear')}}"><span class="mif-plus"></span> Crear</a>
    <a href="{{url('reportes/horarios-pdf')}}" class="button success"><span class="mif-print"></span>Imprimir</a>
    <hr class="thin bg-grayLighter">
    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
        <thead>
        <tr>
            <td class="sortable-column sort-asc" style="width: 100px">ID</td>
            <td>Nombre</td>
            <td class="sortable-column">Entrada</td>
            <td class="sortable-column">Salida</td>
            <td>Dias</td>
            <td>Tipo</td>
            <td>Operaciones</td>
        </tr>
        </thead>
        <tbody>
        @forelse($horario as $hora)
            <tr>
                <td>{{$hora->id}}</td>
                <td>{{$hora->horario_nombre}}</td>
                <td>{{$hora->horario_entrada}}</td>
                <td>{{$hora->horario_salida}}</td>
                <td>{{$hora->horario_dias}}</td>
                <td>{{$hora->horario_tipo}}</td>
                <td style="padding: 0px;">
                    {!! csrf_field() !!}
                    <a href="{{ url('/horarios/'.$hora->id.'/editar') }}" class="button success"><span class="icon mif-pencil"></span></a>
                    <button type="button" class="button danger" onclick='confirmar({{$hora->id}})'><span class="icon mif-cancel"></span></button>
                </td>
            </tr>
        @empty
            <h1>error</h1>
        @endforelse
        </tbody>
    </table>
    <br><br>
    <div class="pull-right">
        <a class="button danger" href="{{url('horarios')}}"><span class="mif-backward"></span> Regresar</a>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/horarios.js')}}"></script>
@endsection
