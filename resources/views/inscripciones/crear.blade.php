@extends('layout')

@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/normalize.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="text-light">Registrar Inscripcion<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <div class="row">
        <div class="cell colspan1"></div>
        <div class="cell colspan6">
            <form method="POST" action="{{url('inscripciones/insertar')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="cell">
                    <h4 for="nit">Alumno: </h4>
                    <div class="input-control select full-size">
                        <select name="alumno" id="alumno"></select>
                    </div>
                </div>
                <div class="cell">
                    <h4 for="curso">Curso: </h4>
                    <div class="input-control text" data-role="input">
                        <input type="text" name="curso2" id="curso2" readonly>
                        <a id="demo01" href="#animatedModal" class="button"><span class="mif-search"></span></a>
                    </div>
                </div>
                <div class="cell">
                    <h4 for="obs">Observaciones: </h4>
                    <div class="input-control text full-size">
                        <input type="text" name="obs" id="obs">
                    </div>
                </div>


                <div class="cell place-right">
                    <button type="submit" class="button success block-shadow-success text-shadow">Inscribir</button>
                    <a href="{{ url('/inscripciones') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>
                </div>
            </form>
        </div>
        <div class="cell colspan3">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="notify alert">
                        <span class="notify-title">
                            {{$error}}
                        </span>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

<div id="animatedModal">
    <div class="modal-content">
        <div class="grid condensed">
            <div class="row cells12">
                <div class="cell colspan2">
                    <div class="panel bg-white">
                        <div class="heading">
                            <span class="title">Cursos Disponibles</span>
                        </div>
                        <div class="content bg-white">
                            <div class="listview set-border padding10 default bg-white">
                                @foreach($cursos as $curso)
                                    <div class="list" onclick="mostrar({{$curso->id}})">
                                        <img src="{{asset('img/disk.png')}}" class="list-icon">
                                        <span class="list-title">{{$curso->curso_nombre}}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell colspan10">
                    <div class="panel">
                        <div class="heading">
                            <span class="title">Datos del Curso</span>
                            <a href="#" id="btn-close-modal" class="place-right fg-white close-animatedModal"><span class="icon mif-cancel mif-2x"></span></a>
                        </div>
                        <div class="content bg-white padding10">
                            <h1 align="center" id="ncurso"></h1>
                            <div class="cell">
                                <h1>Horarios: <span id="hora"></span></h1>
                            </div>
                            <div class="grid">
                                <div class="row cells12">
                                    <div class="cell colspan3">
                                        <div class="paper">
                                            <img id="nfoto" class="poster"/>
                                            <h3>Instructor</h3>
                                            <h3 id="nistructor"></h3>
                                            <hr/>
                                            <div class="space"></div>
                                        </div>
                                    </div>
                                    <div class="cell colspan3">
                                        <div class="paper">
                                            <img id="nfoto2" class="poster"/>
                                            <h3>Moto</h3>
                                            <h3 id="nmoto"></h3>
                                            <hr/>
                                            <div class="space"></div>
                                        </div>
                                    </div>
                                    <div class="cell colspan3">
                                        <div class="tile-container bg-white">
                                            <div class="tile bg-darkBlue fg-white" data-role="tile">
                                                <div class="tile-content iconic" align="center">
                                                    <h1 style="font-size: 50px;" id="numero"></h1>
                                                </div>
                                                <h4 class="tile-label" align="center">Estudiantes</h4>
                                            </div>
                                        </div>
                                        <div id="cursoide" style="display: none;"></div>
                                    </div>
                                    <div class="cell colspan3">
                                        <button class="shortcut-button bg-cyan bg-active-darkBlue fg-white close-animatedModal" onclick="agregar()">
                                            <span class="icon mif-checkmark"></span>
                                            <span class="title">Seleccionar</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@section('scripts')
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/animatedModal.min.js')}}"></script>
    <script src="{{asset('js/inscripciones.js')}}"></script>
    <script>
        //$("#demo01").animatedModal();
        $("#demo01").animatedModal({
            modalTarget:'animatedModal',
            animatedIn:'lightSpeedIn',
            animatedOut:'bounceOutDown',
            color:'#fff',
            // Callbacks
            beforeOpen: function() {
                console.log("The animation was called");
            },
            afterOpen: function() {
                console.log("The animation is completed");
            },
            beforeClose: function() {
                console.log("The animation was called");
            },
            afterClose: function() {
                console.log("The animation is completed");
            }
        });
    </script>
@endsection