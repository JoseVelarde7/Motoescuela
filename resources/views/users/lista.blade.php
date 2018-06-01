@extends('layout')
@section('content')
    <h1 class="text-light">Usuarios<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <a class="button primary" href="{{url('users/crear')}}"><span class="mif-plus"></span> Crear</a>
    <hr class="thin bg-grayLighter">
    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
        <thead>
        <tr>
            <td class="sortable-column sort-asc" style="width: 100px;">ID</td>
            <td class="sortable-column">Nombre</td>
            <td class="sortable-column">Carnet</td>
            <td>Celular</td>
            <td>Cargo</td>
            <td>Operaciones</td>
        </tr>
        </thead>
        <tbody>
        @forelse($user as $us)
            <tr>
                <td>{{$us->id}}</td>
                <td>{{$us->user_nombre}}</td>
                <td>{{$us->user_ci}}</td>
                <td>{{$us->user_celular}}</td>
                <td>{{$us->user_cargo}}</td>
                <td style="padding: 0px;">
                    {!! csrf_field() !!}
                    <a href="{{ url('/usuarios/'.$us->id) }}" class="button primary"><span class="icon mif-info"></span></a>
                    <a href="{{ url('/usuarios/'.$us->id.'/editar') }}" class="button success"><span class="icon mif-pencil"></span></a>
                    <button type="button" class="button danger" onclick='confirmar({{$us->id}})'><span class="icon mif-cancel"></span></button>
                </td>
            </tr>
        @empty
            <h1>error</h1>
        @endforelse
        </tbody>
    </table>
@endsection

@section('scripts')
    <script src="{{asset('js/users.js')}}"></script>
@endsection
