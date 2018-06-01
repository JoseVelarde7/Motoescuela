@extends('layout')
@section('content')

    <h1 class="text-light">Control de Asistencias<span class="mif-money place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    {{--<a class="button primary" href="{{url('pagos/crear')}}"><span class="mif-plus"></span> Crear</a>
    <hr class="thin bg-grayLighter">--}}
    <div class="grid">
        {{--<div class="tile-container bg-white">
            <a href="{{url('/asistencias/marcar')}}" class="tile bg-orange fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-dollar"></span>
                </div>
                <h4 class="tile-label" align="center">Marcar</h4>
            </a>
        </div>--}}
        <a class="button bg-orange fg-white" href="{{url('asistencias/marcar')}}"><span class="mif-plus"></span> Marcar</a>
        <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
            <thead>
            <tr>
                <td class="sortable-column sort-asc" style="width: 100px">ID</td>
                <td class="sortable-column">Fecha</td>
                <td class="sortable-column">Hora Entrada</td>
                <td>Hora Salida</td>
                <td>Usuario</td>
            </tr>
            </thead>
            <tbody>
            @forelse($asistencias as $as)
                <tr>
                    <td>{{$as->id}}</td>
                    <td>{{$as->asistencia_fecha}}</td>
                    <td>{{$as->asistencia_entrada}}</td>
                    <td>{{$as->asistencia_salida}}</td>
                    <td>{{$as->user_nombre}}</td>
                </tr>
            @empty
                <h1>error</h1>
            @endforelse
            </tbody>
        </table>
    </div>



@endsection

@section('scripts')
    <script src="{{asset('js/asistencias.js')}}"></script>
@endsection
