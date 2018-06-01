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
</head>
<body class="bg-steel">
<div class="app-bar fixed-top darcula" data-role="appbar">
    <a class="app-bar-element branding">1ra Motoescuela Dakar</a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu">
    </ul>
    <div class="app-bar-element place-right">
        <a href="/" class="fg-white"><span class="mif-arrow-left"></span>Regresar</a>
    </div>
</div>

<div class="page-content bg-white">
    <div class="flex-grid" style="height: 100%;">
        <div class="cell auto-size padding20 bg-white" id="cell-content">
            <h1 align="center">Registro de Asistencias</h1>
            <hr class="thin bg-grayLighter"><br><br>
            <div class="row">
                <div class="cell colspan4"></div>
                <div class="cell colspan4">
                    <form id="formulario1">
                        {!! csrf_field() !!}
                        <div class="cell">
                            <label for="user">Usuario</label>
                            <div class="input-control select full-size">
                                <select name="user" id="user"></select>
                            </div>
                        </div>
                        <div class="cell">
                            <label for="pass">Contraseña </label>
                            <div class="input-control text full-size">
                                <input type="password" name="pass" id="pass" value="{{old('pass')}}">
                            </div>
                        </div>
                    </form>
                    <div class="cell">
                        <div class="tile-container bg-white" style="margin-left: 60px;">
                            <button type="button" id="entrada" class="tile bg-green fg-white" data-role="tile">
                                <div class="tile-content iconic">
                                    <span class="icon mif-checkmark"></span>
                                </div>
                                <h4 class="tile-label" align="center">Entrada</h4>
                            </button>
                            <button id="salida" class="tile bg-red fg-white" data-role="tile">
                                <div class="tile-content iconic">
                                    <span class="icon mif-exit"></span>
                                </div>
                                <h4 class="tile-label" align="center">Salida</h4>
                            </button>
                        </div>
                    </div>
                    <!--<div class="cell" align="center"><br><br>
                        <a class="button bg-success" href="{{url('/asistencias')}}"><span class="mif-arrow-left"></span>Regresar</a>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.datables.min.js')}}"></script>
<script src="{{asset('js/metro.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/asistencias.js')}}"></script>
</body>
</html>