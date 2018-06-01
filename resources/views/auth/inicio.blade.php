<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />
    <title>Inicio</title>

    <link href="{{asset('css/metro.css')}}" rel="stylesheet">
    <link href="{{asset('css/metro-icons.css')}}" rel="stylesheet">
    <link href="{{asset('css/metro-responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.datables.min.js')}}"></script>
    <script src="{{asset('js/metro.js')}}"></script>
    <script src="{{asset('js/inicio.js')}}"></script>

    <style>
        .tile-area-controls {
            position: fixed;
            right: 40px;
            top: 40px;
        }

        .tile-group {
            left: 100px;
        }

        .tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super {
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }

        #charmSettings .button {
            margin: 5px;
        }

        .schemeButtons {
            /*width: 300px;*/
        }

        @media screen and (max-width: 640px) {
            .tile-area {
                overflow-y: scroll;
            }
            .tile-area-controls {
                display: none;
            }
        }

        @media screen and (max-width: 320px) {
            .tile-area {
                overflow-y: scroll;
            }

            .tile-area-controls {
                display: none;
            }

        }
    </style>


    <script>
        (function($) {
            $.StartScreen = function(){
                var plugin = this;
                var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

                plugin.init = function(){
                    setTilesAreaSize();
                    if (width > 640) addMouseWheel();
                };

                var setTilesAreaSize = function(){
                    var groups = $(".tile-group");
                    var tileAreaWidth = 80;
                    $.each(groups, function(i, t){
                        if (width <= 640) {
                            tileAreaWidth = width;
                        } else {
                            tileAreaWidth += $(t).outerWidth() + 80;
                        }
                    });
                    $(".tile-area").css({
                        width: tileAreaWidth
                    });
                };

                var addMouseWheel = function (){
                    $("body").mousewheel(function(event, delta, deltaX, deltaY){
                        var page = $(document);
                        var scroll_value = delta * 50;
                        page.scrollLeft(page.scrollLeft() - scroll_value);
                        return false;
                    });
                };

                plugin.init();
            }
        })(jQuery);

        $(function(){
            $.StartScreen();

            var tiles = $(".tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super");

            $.each(tiles, function(){
                var tile = $(this);
                setTimeout(function(){
                    tile.css({
                        opacity: 1,
                        "-webkit-transform": "scale(1)",
                        "transform": "scale(1)",
                        "-webkit-transition": ".3s",
                        "transition": ".3s"
                    });
                }, Math.floor(Math.random()*500));
            });

            $(".tile-group").animate({
                left: 0
            });
        });


        $(function(){
            var current_tile_area_scheme = localStorage.getItem('tile-area-scheme') || "tile-area-scheme-dark";
            $(".tile-area").removeClass (function (index, css) {
                return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
            }).addClass(current_tile_area_scheme);

            $(".schemeButtons .button").hover(
                function(){
                    var b = $(this);
                    var scheme = "tile-area-scheme-" +  b.data('scheme');
                    $(".tile-area").removeClass (function (index, css) {
                        return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                    }).addClass(scheme);
                },
                function(){
                    $(".tile-area").removeClass (function (index, css) {
                        return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                    }).addClass(current_tile_area_scheme);
                }
            );

            $(".schemeButtons .button").on("click", function(){
                var b = $(this);
                var scheme = "tile-area-scheme-" +  b.data('scheme');

                $(".tile-area").removeClass (function (index, css) {
                    return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                }).addClass(scheme);

                current_tile_area_scheme = scheme;
                localStorage.setItem('tile-area-scheme', scheme);

                showSettings();
            });
        });

    </script>

</head>
<body style="overflow-y: hidden;">

<div class="tile-area tile-area-scheme-darkBlue fg-white" style="height: 100%; max-height: 100% !important;">
    <h1 class="tile-area-title">1ra Motoescuela Dakar</h1>
    <div class="tile-area-controls">
        <button class="image-button icon-right bg-darkBlue fg-white bg-hover-dark no-border"><span class="sub-header no-margin text-light">{{Auth::user()->user_nombre}}</span> <span class="icon mif-user"></span></button>
        <a href="{{ url('/salir') }}" class="square-button bg-darkRed fg-white bg-hover-dark no-border"><span class="mif-cancel"></span></a>
    </div>

    @if(Auth::user()->user_tipo=='USER1')
    <div class="tile-group double">
        <span class="tile-group-title">Usuarios</span>
        <div class="tile-container">
            <div class="tile-wide bg-darkGreen fg-white" data-role="tile" data-effect="slideLeft">
                <div class="tile-content" align="center">
                    <h1 style="font-size: 100px;" id="cusuarios"></h1>
                </div>
                <div class="tile-label">Usuarios Registrados</div>
            </div>
            <a href="{{ url('/usuarios') }}" class="tile bg-indigo fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-user"></span>
                </div>
                <span class="tile-label">Usuarios</span>
            </a>
            <a href="{{ url('/users/crear') }}" class="tile bg-darkOrange fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-user-plus"></span>
                </div>
                <span class="tile-label">Crear Usuario</span>
            </a>
        </div>
    </div>
    @endif

    <div class="tile-group double">
        <span class="tile-group-title">Alumnos</span>
        <div class="tile-container">
            <div class="tile-wide bg-darkRed fg-white" data-role="tile" data-effect="slideLeft">
                <div class="tile-content" align="center">
                    <h1 style="font-size: 100px;" id="calumnos"></h1>
                </div>
                <div class="tile-label">Alumnos Registrados</div>
            </div>
            <a href="{{ url('/alumnos') }}" class="tile bg-orange fg-white" data-role="tile" data-role="tile" data-effect="slideUpDown">
                <div class="tile-content iconic">
                    <span class="icon mif-user-check"></span>
                </div>
                <div class="tile-label">Alumnos</div>
            </a>

            @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
            <a href="{{ url('/alumnos/crear') }}" class="tile-small bg-amber fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-file-archive"></span>
                </div>
                <div class="tile-label">Crear</div>
            </a>
            <a href="{{ url('/pagos') }}" class="tile-small bg-green fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-money"></span>
                </div>
                <div class="tile-label">Pagos</div>
            </a>
            <a href="{{ url('/facturas/crear') }}" class="tile-small bg-pink fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-money"></span>
                </div>
                <div class="tile-label">Factura</div>
            </a>
            <a href="{{ url('/inscripciones') }}" class="tile-wide bg-red fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-file-play"></span>
                </div>
                <div class="tile-label">Inscripciónes</div>
            </a>
            @endif

        </div>
    </div>

    <div class="tile-group one">
        <span class="tile-group-title">Cursos</span>
        <a class="tile-small bg-blue fg-white" style="display: none;" id="contenedor1" data-role="tile">
            <h4 align="center" id="curso1"></h4>
        </a>
        <a class="tile-small bg-red fg-white" style="display: none;" id="contenedor2" data-role="tile">
            <h4 align="center" id="curso2"></h4>
        </a>
        <a class="tile-small bg-yellow fg-white" style="display: none;" id="contenedor3" data-role="tile">
            <h4 align="center" id="curso3"></h4>
        </a>
        <a class="tile-small bg-darkOrange fg-white" style="display: none;" id="contenedor4" data-role="tile">
            <h4 align="center" id="curso4"></h4>
        </a>
        <a class="tile-small bg-pink fg-white" style="display: none;" id="contenedor5" data-role="tile">
            <h4 align="center" id="curso5"></h4>
        </a>
        <a class="tile-small bg-amber fg-white" style="display: none;" id="contenedor6" data-role="tile">
            <h4 align="center" id="curso6"></h4>
        </a>
        <a class="tile-small bg-brown fg-white" style="display: none;" id="contenedor7" data-role="tile">
            <h4 align="center" id="curso7"></h4>
        </a>
        <a class="tile-small bg-darkCrimson fg-white" style="display: none;" id="contenedor8" data-role="tile">
            <h4 align="center" id="curso8"></h4>
        </a>
        <a class="tile-small bg-darkMagenta fg-white" style="display: none;" id="contenedor9" data-role="tile">
            <h4 align="center" id="curso9"></h4>
        </a>
    </div>

    <div class="tile-group double">
        <span class="tile-group-title">Motocletas</span>
        <div class="tile-container">
            <div class="tile bg-lighterBlue" data-role="tile">
                <div class="tile-content" align="center">
                    <h1 style="font-size: 80px;">150</h1>
                </div>
                <div class="tile-label">Motos Registrados</div>
            </div>
            @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
            <a href="{{ url('/motos/crear') }}" class="tile bg-darkOrange fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-registered"></span>
                </div>
                <div class="tile-label">Registrar</div>
            </a>
            @endif
            <a href="{{ url('/motos') }}" class="tile-wide bg-green fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-motorcycle"></span>
                </div>
                <div class="tile-label">Lista</div>
            </a>
        </div>
    </div>

    <div class="tile-group double">
        <span class="tile-group-title">Horarios</span>
        <div class="tile-container">
            @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
            <a href="{{ url('/horarios') }}" class="tile bg-teal fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-list"></span>
                </div>
                <span class="tile-label">Lista</span>
            </a>
            <a href="{{ url('/horarios/general') }}" class="tile bg-cyan fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-school"></span>
                </div>
                <div class="tile-label">General</div>
            </a>
            @endif
            <a href="{{ url('/asistencias') }}" class="tile bg-darkBlue fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-spell-check"></span>
                </div>
                <span class="tile-label">Asistencia</span>
            </a>
            <a href="{{ url('/horarios/instructores') }}" class="tile bg-darkGreen fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-sd-card"></span>
                </div>
                <span class="tile-label">Instructores</span>
            </a>
        </div>
    </div>

    <div class="tile-group double">
        <span class="tile-group-title">Examenes</span>
        <a href="ingresar" class="tile-container">
            <div class="tile bg-darkCrimson fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <span class="icon mif-try"></span>
                </div>
                <span class="tile-label">Tomar Examen</span>
            </div>
        </a>
    </div>
</div>
</body>
</html>

