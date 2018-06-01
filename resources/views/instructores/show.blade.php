@extends('layout')

@section('content')

    <h1 class="text-light">Información del Instructor<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">

    <div class="presenter" data-role="presenter" data-height="300" data-easing="swing" data-scene-timeout="20000" data-timeout="500">
        <div class="scene">
            <div class="act bg-darkBlue fg-white">
                <img src="{{asset('storage/'.$instructor->inst_foto)}}" class="actor" data-position="10,10" style="height: 250px">
                <h1 class="actor" data-position="10,400">{{$instructor->inst_nombre}}</h1>
                <h3 class="actor" data-position="70,400"><span class="mif-location mif-2x"></span> {{$instructor->inst_direccion}}</h3>
                <h3 class="actor" data-position="110,400"><span class="mif-phone mif-2x"></span> {{$instructor->inst_celular}}</h3>
                <h3 class="actor" data-position="150,400"><span class="mif-credit-card mif-2x"></span> {{$instructor->inst_ci}}</h3>
                <h3 class="actor" data-position="190,400"><span class="mif-info mif-2x"></span> {{$instructor->inst_observacion}}</h3>
            </div>
        </div>
    </div>
    <hr class="thin bg-grayLighter">
    <div class="place-right">
        <a href="{{ url('/instructores') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/instructores.js')}}"></script>
@endsection