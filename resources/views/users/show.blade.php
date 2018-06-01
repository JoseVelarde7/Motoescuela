@extends('layout')

@section('content')

    <h1 class="text-light">Información del Usuario<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <div class="presenter" data-role="presenter" data-height="300" data-easing="swing" data-scene-timeout="20000" data-timeout="500">
        <div class="scene">
            <div class="act bg-white fg-black">
                <img src="{{asset('storage/'.$user->user_foto)}}" class="actor" data-position="10,10" style="height: 250px">
                <h1 class="actor" data-position="10,400">{{$user->user_nombre}}</h1>
                <h3 class="actor" data-position="70,400"><span class="mif-location mif-2x"></span> {{$user->user_direccion}}</h3>
                <h3 class="actor" data-position="110,400"><span class="mif-phone mif-2x"></span> {{$user->user_celular}}</h3>
                <h3 class="actor" data-position="150,400"><span class="mif-credit-card mif-2x"></span> {{$user->user_ci}}</h3>
                <h3 class="actor" data-position="190,400"><span class="mif-info mif-2x"></span> {{$user->user_cargo}}</h3>
                <h3 class="actor" data-position="230,400"><span class="mif-info mif-2x"></span> {{$user->user_tipo}}</h3>
            </div>
        </div>
    </div>
    <hr class="thin bg-grayLighter">
    <div class="place-right">
        <a href="{{ url('/usuarios') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/users.js')}}"></script>
@endsection