@extends('layout')
@section('content')

  <h1 class="text-light">Pagos<span class="mif-money place-right"></span></h1>
  <hr class="thin bg-grayLighter">
  {{--<a class="button primary" href="{{url('pagos/crear')}}"><span class="mif-plus"></span> Crear</a>
  <hr class="thin bg-grayLighter">--}}
  <div class="tile-container bg-white">
    @if(Auth::user()->user_tipo=="USER1")
      <a href="http://localhost/facturacion/pages/forms/sign.php?usuario=admin.admin&clave=utic" class="tile bg-green fg-white" data-role="tile">
        <div class="tile-content iconic">
          <span class="icon mif-dollar"></span>
        </div>
        <h4 class="tile-label" align="center">Módulo Facturación</h4>
      </a>
    @endif

    @if(Auth::user()->user_tipo=="USER2")
        <a href="http://localhost/facturacion/pages/forms/sign.php?usuario=user.user&clave=123" class="tile bg-green fg-white" data-role="tile">
          <div class="tile-content iconic">
            <span class="icon mif-dollar"></span>
          </div>
          <h4 class="tile-label" align="center">Módulo Facturación</h4>
        </a>
    @endif

    <!--<a href="{{url('/facturas/crear')}}" class="tile bg-green fg-white" data-role="tile">
      <div class="tile-content iconic">
        <span class="icon mif-dollar"></span>
      </div>
      <h4 class="tile-label" align="center">Crear Factura</h4>
    </a>
  <a href="{{url('/facturas')}}" class="tile bg-darkBlue fg-white" data-role="tile">
            <div class="tile-content iconic">
                <span class="icon mif-list"></span>
            </div>
            <h4 class="tile-label" align="center">Lista Facturas</h4>
        </a>-->
  </div>
  {{--<table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
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
                  <a href="{{ url('/motos/'.$mo->id.'/editar') }}" class="button success"><span class="icon mif-pencil"></span></a>
                  <button type="button" class="button danger" onclick='confirmar({{$mo->id}})'><span class="icon mif-cancel"></span></button>
              </td>
          </tr>
      @empty
          <h1>error</h1>
      @endforelse
      </tbody>
  </table>--}}
@endsection

@section('scripts')
  <script src="{{asset('js/pagos.js')}}"></script>
@endsection
