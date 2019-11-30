@extends('layfactura')

@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="text-light">Lista de Recibos<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
        <thead>
        <tr>
            <td class="sortable-column sort-asc" style="width: 100px">ID</td>
            <td class="sortable-column">Numero</td>
            <td class="sortable-column">Fecha</td>
            <td>Nombre</td>
            <td>Nit</td>
            <td>Total</td>
            <td>Estado</td>
            <td>Operaciones</td>
        </tr>
        </thead>
        <tbody>
        @forelse($facturas as $fac)
            @if($fac->factura_estado=='Emitido')
                <tr class="success">
                    <td>{{$fac->id}}</td>
                    <td>{{$fac->factura_numero}}</td>
                    <td>{{$fac->factura_fecha}}</td>
                    <td>{{$fac->factura_razon}}</td>
                    <td>{{$fac->factura_nit}}</td>
                    <td>{{$fac->factura_total}}</td>
                    <td>{{$fac->factura_estado}}</td>
                    <td style="padding: 0px;">
                        {!! csrf_field() !!}
                        <a href="{{ url('/facturas/mostrar/'.$fac->id) }}" class="button primary"><span class="icon mif-info"></span></a>
                        <button type="button" class="button danger" onclick='confirmar({{$fac->id}})'><span class="icon mif-cancel"></span></button>
                    </td>
                </tr>
            @else
                <tr class="warning">
                    <td>{{$fac->id}}</td>
                    <td>{{$fac->factura_numero}}</td>
                    <td>{{$fac->factura_fecha}}</td>
                    <td>{{$fac->factura_razon}}</td>
                    <td>{{$fac->factura_nit}}</td>
                    <td>{{$fac->factura_total}}</td>
                    <td>{{$fac->factura_estado}}</td>
                    <td style="padding: 0px;">
                        {!! csrf_field() !!}
                        <a href="{{ url('/facturas/mostrar/'.$fac->id) }}" class="button primary"><span class="icon mif-info"></span></a>
                    </td>
                </tr>
            @endif
        @empty
            <h1>error</h1>
        @endforelse
        </tbody>
    </table>



@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/facturas2.js')}}"></script>
@endsection