@extends('layout')
@section('content')

    <h1 class="text-light">Alumnos<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
    <a class="button primary" href="{{url('alumnos/crear')}}"><span class="mif-plus"></span> Crear</a>
    <hr class="thin bg-grayLighter">
    @endif
    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
        <thead>
        <tr>
            <td class="sortable-column sort-asc" style="width: 100px">ID</td>
            <td class="sortable-column">Nombre</td>
            <td class="sortable-column">Celular</td>
            <td>Direccion</td>
            <td>Carnet</td>
            <td>Estado</td>
            <td>Operaciones</td>
        </tr>
        </thead>
        <tbody>
        @forelse($alumnos as $alumno)
            <tr>
                <td>{{$alumno->id}}</td>
                <td>{{$alumno->alumno_nombre}}</td>
                <td>{{$alumno->alumno_celular}}</td>
                <td>{{$alumno->alumno_direccion}}</td>
                <td>{{$alumno->alumno_ci}}</td>
                <td>{{$alumno->alumno_activo}}</td>
                <td style="padding: 0px;">
                    {{--<form action="{{ url('/alumnos/'.$alumno->id.'/borrar') }}" method="POST" id="form1">
                        {{ method_field('DELETE') }}--}}
                    {!! csrf_field() !!}
                    <a href="{{ url('/alumnos/'.$alumno->id) }}" class="button primary"><span class="icon mif-info"></span></a>
                    @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
                    <a href="{{ url('/alumnos/'.$alumno->id.'/editar') }}" class="button success"><span class="icon mif-pencil"></span></a>
                    <button type="button" class="button danger" onclick='confirmar({{$alumno->id}})'><span class="icon mif-cancel"></span></button>
                    @endif
                    {{--</form>--}}
                </td>
            </tr>
        @empty
            <h1>error</h1>
        @endforelse
        </tbody>
    </table>
@endsection

@section('scripts')
    <script src="{{asset('js/alumnos.js')}}"></script>
@endsection
