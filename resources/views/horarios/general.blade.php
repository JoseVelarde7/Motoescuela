@extends('layout2')
@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
@endsection
@php
    $colores = array("bg-green fg-white", "bg-pink fg-white", "bg-red fg-white", "bg-orange fg-white", "bg-amber fg-white","bg-yellow fg-white", "bg-amber fg-white","bg-yellow fg-white", "bg-teal fg-white","bg-emerald fg-white");
@endphp
@section('content')
    <div align="center">
        <h1>Horario General Semanal</h1>
    </div>
    <div class="grid">
        <div class="row flex-just-center">
            <div class="cell colspan10">
                <table class="table bordered hovered">
                    <thead>
                    <tr>
                        <th class="bg-lighterBlue fg-white">Horario</th>
                        <th class="bg-lighterBlue fg-white">Lunes</th>
                        <th class="bg-lighterBlue fg-white">Martes</th>
                        <th class="bg-lighterBlue fg-white">Miercoles</th>
                        <th class="bg-lighterBlue fg-white">Jueves</th>
                        <th class="bg-lighterBlue fg-white">Viernes</th>
                    </tr>
                    </thead>
                    <tbody>
                            <tr id="periodo1">
                                <td class="bg-lightRed fg-white size4">08:30 a 10:30</td>
                                @php $c=""; @endphp
                                @foreach($cursos as $curso)
                                    @if($curso->horario_nombre=='PERIODO 1')
                                        @php
                                            $c=$c.'<a href="#animatedModal" onclick="mostrar('.$curso->id.')" class="demo01 button '.$colores[array_rand($colores)].' block-shadow-primary text-shadow">'.$curso->user_nombre.'</a>';
                                        @endphp
                                    @endif
                                @endforeach
                                <td>@php echo $c; @endphp</td>
                                <td>@php echo $c; @endphp</td>
                                <td>@php echo $c; @endphp</td>
                                <td>@php echo $c; @endphp</td>
                                <td>@php echo $c; @endphp</td>
                            </tr>
                            <tr id="periodo2">
                                <td class="bg-lightRed fg-white">10:30 a 12:30</td>
                                @php $c=""; @endphp
                                @foreach($cursos as $curso)
                                    @if($curso->horario_nombre=='PERIODO 2')
                                        @php
                                            $c=$c.'<a href="#animatedModal" onclick="mostrar('.$curso->id.')" class="demo01 button '.$colores[array_rand($colores)].' block-shadow-primary text-shadow">'.$curso->user_nombre.'</a>';
                                        @endphp
                                    @endif
                                @endforeach
                                @php
                                    for ($i=0;$i<5;$i++){
                                        echo("<td>$c</td>");
                                    }
                                @endphp
                            </tr>
                            <tr id="periodo3">
                                <td  class="bg-lightRed fg-white">14:30 a 16:30</td>
                                @php $c=""; @endphp
                                @foreach($cursos as $curso)
                                    @if($curso->horario_nombre=='PERIODO 3')
                                        @php
                                            $c=$c.'<a href="#animatedModal" onclick="mostrar('.$curso->id.')" class="demo01 button '.$colores[array_rand($colores)].' block-shadow-primary text-shadow">'.$curso->user_nombre.'</a>';
                                        @endphp
                                    @endif
                                @endforeach
                                @php
                                    for ($i=0;$i<5;$i++){
                                        echo("<td>$c</td>");
                                    }
                                @endphp
                            </tr>
                            <tr id="periodo4">
                                <td  class="bg-lightRed fg-white">16:30 a 18:30</td>
                                @php $c=""; @endphp
                                @foreach($cursos as $curso)
                                    @if($curso->horario_nombre=='PERIODO 4')
                                        @php
                                            $c=$c.'<a href="#animatedModal" onclick="mostrar('.$curso->id.')" class="demo01 button '.$colores[array_rand($colores)].' block-shadow-primary text-shadow">'.$curso->user_nombre.'</a>';
                                        @endphp
                                    @endif
                                @endforeach
                                @php
                                    for ($i=0;$i<5;$i++){
                                        echo("<td>$c</td>");
                                    }
                                @endphp
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>
    <div align="center">
        <h1>Horario General Fin de Semana</h1>
    </div>
    <div class="grid">
        <div class="row flex-just-center">
            <div class="cell colspan10">
                <table class="table bordered hovered">
                    <thead>
                    <tr>
                        <th class="bg-lighterBlue fg-white">Horario</th>
                        <th class="bg-lighterBlue fg-white">Sábado y Domingo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="fin1">
                        <td class="bg-lightRed fg-white size4">08:00 a 18:00</td>
                        @php $c=""; @endphp
                        @foreach($cursos as $curso)
                            @if($curso->horario_nombre=='FIN DE SEMANA')
                                @php
                                    $c=$c.'<a href="#animatedModal" onclick="mostrar('.$curso->id.')" class="demo01 button '.$colores[array_rand($colores)].' block-shadow-primary text-shadow">'.$curso->user_nombre.'</a>';
                                @endphp
                            @endif
                        @endforeach
                        <td>@php echo $c; @endphp</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div align="center" class="pull-right">
            <a class="button danger" href="{{url('horarios')}}"><span class="mif-backward"></span> Regresar</a>
        </div>
    </div>

    <div id="animatedModal">
        <div class="modal-content">
            <div class="grid condensed">
                <div class="row cells12">
                    <div class="cell colspan1"></div>
                    <div class="cell colspan10">
                        <div class="panel">
                            <div class="heading">
                                <span class="title">Información de la Inscripción</span>
                                <a href="#" id="btn-close-modal" class="place-right fg-white close-animatedModal"><span class="icon mif-cancel mif-2x"></span></a>
                            </div>
                            <div class="content bg-white padding10">
                                <h1 align="center" id="ncurso"></h1>
                                <div class="cell">
                                    <h1>Alumno: <span id="nalumno"></span></h1>
                                </div>
                                <div class="grid">
                                    <div class="row cells12">
                                        <div class="cell colspan3">
                                            <div class="panel success" align="center">
                                                <div class="heading">Horarios</div>
                                                <h3 id="entrada"></h3>
                                            </div>
                                        </div>
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
                                            <div class="panel info-box" align="center">
                                                <div class="heading">Estado</div>
                                                <div class="estados"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="cell colspan1"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/animatedModal.min.js')}}"></script>
    <script src="{{asset('js/horarios.js')}}"></script>
    <script>
        //$("#demo01").animatedModal();
        $(".demo01").animatedModal({
            modalTarget:'animatedModal',
            animatedIn:'lightSpeedIn',
            animatedOut:'bounceOutDown',
            color:'#fff',
            beforeOpen: function() {
            },
            afterOpen: function() {
            },
            beforeClose: function() {
            },
            afterClose: function() {
            }
        });
    </script>
@endsection