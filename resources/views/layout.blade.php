<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />

    <title>1ra Motoescuela Dakar</title>

    <link href="{{asset('css/metro.css')}}" rel="stylesheet">
    <link href="{{asset('css/metro-icons.css')}}" rel="stylesheet">
    <link href="{{asset('css/metro-responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('estilos')
</head>
<body class="bg-steel">
<div class="app-bar fixed-top darcula" data-role="appbar">
    <a class="app-bar-element branding">1ra Motoescuela Dakar</a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu">
        <!--<li><a href="">Dashboard</a></li>
        <li>
            <a href="" class="dropdown-toggle">Project</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="">New project</a></li>
                <li class="divider"></li>
                <li>
                    <a href="" class="dropdown-toggle">Reopen</a>
                    <ul class="d-menu" data-role="dropdown">
                        <li><a href="">Project 1</a></li>
                        <li><a href="">Project 2</a></li>
                        <li><a href="">Project 3</a></li>
                        <li class="divider"></li>
                        <li><a href="">Clear list</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="">Security</a></li>
        <li><a href="">System</a></li>
        <li>
            <a href="" class="dropdown-toggle">Help</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="">ChatOn</a></li>
                <li><a href="">Community support</a></li>
                <li class="divider"></li>
                <li><a href="">About</a></li>
            </ul>
        </li>-->
    </ul>

    <div class="app-bar-element place-right">
        <span class="dropdown-toggle"><span class="mif-cog"></span> {{Auth::user()->user_nombre}}</span>
        <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
            <h2 class="text-light">Opciones</h2>
            <ul class="unstyled-list fg-dark">
                <li><a href="" class="fg-white1 fg-hover-yellow">Perfil</a></li>
                <li><a href="" class="fg-white2 fg-hover-yellow">Seguridad</a></li>
                <li><a href="{{ url('/salir') }}" class="fg-white3 fg-hover-yellow">Salir</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="flex-grid no-responsive-future" style="height: 100%;">
        <div class="row" style="height: 100%">
            <div class="cell size-x200" id="cell-sidebar" style="background-color: #71b1d1; height: 100%">
                <ul class="sidebar">
                    <li id="menu_inicio"><a href="{{ url('/inicio') }}">
                            <span class="mif-home icon"></span>
                            <span class="title">Inicio</span>
                        </a>
                    </li>
                    @if(Auth::user()->user_tipo=='USER1')
                    <li id="menu_user"><a href="{{ url('/usuarios') }}">
                            <span class="mif-user icon"></span>
                            <span class="title">Usuarios</span>
                        </a>
                    </li>
                    @endif
                    <li id="menu_alumno"><a href="{{ url('/alumnos') }}">
                            <span class="mif-user icon"></span>
                            <span class="title">Alumnos</span>
                        </a>
                    </li>
                    {{--<li id="menu_inst"><a href="{{ url('/instructores') }}">
                            <span class="mif-users icon"></span>
                            <span class="title">Instructores</span>
                        </a>
                    </li>--}}
                    <li id="menu_moto"><a href="{{ url('/motos') }}">
                            <span class="mif-motorcycle icon"></span>
                            <span class="title">Motocicletas</span>
                        </a></li>
                    <li id="menu_curso"><a href="{{ url('/cursos') }}">
                            <span class="mif-profile icon"></span>
                            <span class="title">Cursos</span>
                        </a></li>
                    <li id="menu_horario"><a href="{{ url('/horarios') }}">
                            <span class="mif-table icon"></span>
                            <span class="title">Horarios</span>
                        </a>
                    </li>
                    @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
                    <li id="menu_pago"><a href="{{ url('/pagos') }}">
                            <span class="mif-money icon"></span>
                            <span class="title">Pagos</span>
                        </a>
                    </li>
                    <li id="menu_ins"><a href="{{ url('/inscripciones') }}">
                            <span class="mif-file-archive icon"></span>
                            <span class="title">Inscripciones</span>
                        </a>
                    </li>
                    <li id="menu_asistencia"><a href="{{ url('/asistencias') }}">
                            <span class="mif-list2 icon"></span>
                            <span class="title">Asistencia</span>
                        </a>
                    </li>
                    @endif
                    <li id="menu_examen"><a href="{{ url('/examenes') }}">
                            <span class="mif-file-archive icon"></span>
                            <span class="title">Examenes</span>
                        </a>
                    </li>
                    <!--<li><a href="#">
                        <span class="mif-apps icon"></span>
                        <span class="title">all items</span>
                        <span class="counter">0</span>
                    </a></li>-->
                </ul>
            </div>
            <div class="cell auto-size padding20 bg-white" id="cell-content">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.datables.min.js')}}"></script>
<script src="{{asset('js/metro.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script>
    function pushMessage(t){
        var mes = 'Info|Implement independently';
        $.Notify({
            caption: mes.split("|")[0],
            content: mes.split("|")[1],
            type: t
        });
    }
    $(function(){
        $('.sidebar').on('click', 'li', function(){
            if (!$(this).hasClass('active')) {
                $('.sidebar li').removeClass('active');
                $(this).addClass('active');
            }
        })
    })
</script>
@yield('scripts')
</body>
</html>