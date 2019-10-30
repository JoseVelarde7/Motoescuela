@extends('layout')
@section('content')

    <h1 class="text-light">Motocicletas<span class="mif-motorcycle place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
    <a class="button primary" href="{{url('motos/crear')}}"><span class="mif-plus"></span> Crear</a>
    <a href="{{url('reportes/motos-pdf')}}" class="button success"><span class="mif-print"></span>Imprimir</a>
    <hr class="thin bg-grayLighter">
    @endif
    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
        <thead>
        <tr>
            <td class="sortable-column sort-asc" style="width: 100px">ID</td>
            <td class="sortable-column">Marca</td>
            <td class="sortable-column">Tipo</td>
            <td>Modelo</td>
            <td>Placa</td>
            <td>Color</td>
            <td>Operaciones</td>
        </tr>
        </thead>
        <tbody>
        @forelse($moto as $mo)
            <tr>
                <td>{{$mo->id}}</td>
                <td>{{$mo->moto_marca}}</td>
                <td>{{$mo->moto_tipo}}</td>
                <td>{{$mo->moto_modelo}}</td>
                <td>{{$mo->moto_placa}}</td>
                <td>{{$mo->moto_color}}</td>
                <td style="padding: 0px;">
                    {!! csrf_field() !!}
                    <a href="{{ url('/motos/'.$mo->id) }}" class="button primary"><span class="icon mif-info"></span></a>
                    @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
                    <a href="{{ url('/motos/'.$mo->id.'/editar') }}" class="button success"><span class="icon mif-pencil"></span></a>
                    <button type="button" class="button danger" onclick='confirmar({{$mo->id}})'><span class="icon mif-cancel"></span></button>
                    @endif
                </td>
            </tr>
        @empty
            <h1>error</h1>
        @endforelse
        </tbody>
    </table>
@endsection

@section('scripts')
    <script src="{{asset('js/motos.js')}}"></script>
@endsection
