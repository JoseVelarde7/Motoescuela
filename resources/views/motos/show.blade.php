@extends('layout')

@section('content')

    <h1 class="text-light">Información de la Motocicleta<span class="mif-motorcycle place-right"></span></h1>
    <hr class="thin bg-grayLighter">

    <div class="presenter" data-role="presenter" data-height="300" data-easing="swing" data-scene-timeout="20000" data-timeout="500">
        <div class="scene">
            <div class="act bg-white fg-black">
                <img src="{{asset('storage/'.$moto->moto_foto)}}" class="actor" data-position="10,10" style="height: 250px">
                <h3 class="actor" data-position="10,400">{{$moto->moto_marca}}</h3>
                <h3 class="actor" data-position="70,400">Tipo: {{$moto->moto_tipo}}</h3>
                <h3 class="actor" data-position="110,400">Modelo: {{$moto->moto_modelo}}</h3>
                <h3 class="actor" data-position="150,400">Placa: {{$moto->moto_placa}}</h3>
                <h3 class="actor" data-position="190,400">Color: {{$moto->moto_color}}</h3>
                <h3 class="actor" data-position="230,400">Observacion: {{$moto->moto_observacion}}</h3>
            </div>
        </div>
    </div>
    <hr class="thin bg-grayLighter">
    <div class="place-right">
        <a href="{{ url('/motos') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/motos.js')}}"></script>
@endsection