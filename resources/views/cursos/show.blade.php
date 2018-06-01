@extends('layout')

@section('content')
    <h1 class="text-light">Curso {{($cursos[0]->curso_nombre)}}<span class="mif-motorcycle place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <div class="grid condensed">
        <div class="row cells12">
            <div class="cell colspan3">
                <div class="panel success">
                    <div class="heading">
                        <span class="title">Alumnos del Curso</span>
                    </div>
                    <div class="content padding10 bg-white">
                        <div class="listview set-border padding10" data-role="listview" id="lv1">
                            @foreach($alumnos as $alumno)
                                <div class="list">
                                    <span class="list-icon mif mif-user"></span>
                                    <span class="list-title">{{$alumno->alumno_nombre}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="cell colspan3">
                <div class="panel primary">
                    <div class="heading">
                        <span class="title">Instructor del Curso</span>
                    </div>
                    <div class="content padding10 bg-white">
                        <div class="image-container">
                            <div class="frame"><img src="{{asset('storage/'.$cursos[0]->user_foto)}}"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cell colspan3">
                <div class="panel warning">
                    <div class="heading">
                        <span class="title">Motocicleta del Curso</span>
                    </div>
                    <div class="content padding10 bg-white">
                        <div class="image-container">
                            <div class="frame"><img src="{{asset('storage/'.$cursos[0]->moto_foto)}}"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cell colspan3">
                <div class="panel info">
                    <div class="heading">
                        <span class="title">Horario del Curso</span>
                    </div>
                    <div class="content padding10 bg-white">
                        <div class="image-container">
                            <h3>Ingreso: {{$cursos[0]->horario_entrada}}</h3>
                            <h3>Salida: {{($cursos[0]->horario_salida)}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="presenter" data-role="presenter" data-height="300" data-easing="swing" data-scene-timeout="20000" data-timeout="500">
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
    </div>--}}
    <hr class="thin bg-grayLighter">
    <div class="place-right">
        <a href="{{ url('/cursos') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/cursos.js')}}"></script>
@endsection