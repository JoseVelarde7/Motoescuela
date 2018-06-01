@extends('layout')
@section('content')

    <h1 class="text-light">Instructores<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <a class="button primary" href="{{url('instructores/crear')}}"><span class="mif-plus"></span> Crear</a>
    <hr class="thin bg-grayLighter">
    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
        <thead>
        <tr>
            <td class="sortable-column sort-asc" style="width: 100px">ID</td>
            <td class="sortable-column">Nombre</td>
            <td class="sortable-column">Celular</td>
            <td>Direccion</td>
            <td>Carnet</td>
            <td>Operaciones</td>
        </tr>
        </thead>
        <tbody>
        @forelse($instructor as $inst)
            <tr>
                <td>{{$inst->id}}</td>
                <td>{{$inst->inst_nombre}}</td>
                <td>{{$inst->inst_celular}}</td>
                <td>{{$inst->inst_direccion}}</td>
                <td>{{$inst->inst_ci}}</td>
                <td style="padding: 0px;">
                    {!! csrf_field() !!}
                    <a href="{{ url('/instructores/'.$inst->id) }}" class="button primary"><span class="icon mif-info"></span></a>
                    <a href="{{ url('/instructores/'.$inst->id.'/editar') }}" class="button success"><span class="icon mif-pencil"></span></a>
                    <button type="button" class="button danger" onclick='confirmar({{$inst->id}})'><span class="icon mif-cancel"></span></button>
                </td>
            </tr>
        @empty
            <h1>error</h1>
        @endforelse
        </tbody>
    </table>
@endsection

@section('scripts')
    <script src="{{asset('js/instructores.js')}}"></script>
@endsection
