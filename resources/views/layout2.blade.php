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
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
    @yield('estilos')
</head>
<body class="bg-steel">
<div class="app-bar fixed-top darcula" data-role="appbar">
    <a class="app-bar-element branding">1ra Motoescuela Dakar</a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu">
        @yield('barra')
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
        @yield('nom')
        <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
            <ul class="unstyled-list fg-dark">
                <li><a href="{{ url('/ingresar') }}" class="fg-white3 fg-hover-yellow">Salir</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="page-content bg-white">
    <div class="flex-grid" style="height: 100%;">
        <div class="cell auto-size padding20 bg-white" id="cell-content">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.datables.min.js')}}"></script>
<script src="{{asset('js/metro.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/asistencias.js')}}"></script>
@yield('scripts')
</body>
</html>