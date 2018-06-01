<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fullscreen Form Interface</title>
    <meta name="description" content="Fullscreen Form Interface: A distraction-free form concept with fancy animations" />
    <meta name="keywords" content="fullscreen form, css animations, distraction-free, web design" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico">
    <link href="{{asset('js/extras/css/normalize.css')}}" rel="stylesheet">
    <link href="{{asset('js/extras/css/demo.css')}}" rel="stylesheet">
    <link href="{{asset('js/extras/css/component.css')}}" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="css/cs-select.css" />-->
    <script src="{{asset('js/extras/js/modernizr.custom.js')}}"></script>
</head>
<body>
<div class="container">

    <div class="fs-form-wrap" id="fs-form-wrap">
        <div class="fs-title">
            <h1>{{$examen->pregunta_pregunta}}</h1>
        </div>
        <form id="formulariox" method="POST" class="fs-form fs-form-full" autocomplete="off" action="{{url('examenes/registrar')}}" accept-charset="UTF-8" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <ol class="fs-fields">
                @for($i=1;$i<=$opciones;$i++)
                <li>
                    <label class="fs-field-label fs-anim-upper" for="q{{$i}}">OPCION {{$i}}</label>
                    <textarea class="fs-anim-lower" id="q{{$i}}" name="q{{$i}}" placeholder="Describe here"></textarea>
                    <select name="estado{{$i}}" id="estado{{$i}}">
                        <option value="CORRECTO">CORRECTO</option>
                        <option value="INCORRECTO">INCORRECTO</option>
                    </select>
                    <input type="file" class="form-control" id="file{{$i}}" name="file{{$i}}" style="display: none;">
                </li>
                @endfor
            </ol><!-- /fs-fields -->
            <input type="text" name="codigo" id="codigo" value="{{$examen->id}}" style="display: none;">
            <input type="text" name="op" id="op" value="{{$opciones}}" style="display: none;">
            <button class="fs-submit" type="submit">Crear Pregunta</button>
        </form><!-- /fs-form -->
    </div><!-- /fs-form-wrap -->

</div><!-- /container -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/extras/js/classie.js')}}"></script>
<script src="{{asset('js/extras/js/selectFx.js')}}"></script>
<script src="{{asset('js/extras/js/fullscreenForm.js')}}"></script>
<script src="{{asset('js/examen.js')}}"></script>
<script>
    (function() {
        var formWrap = document.getElementById( 'fs-form-wrap' );

        [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
            new SelectFx( el, {
                stickyPlaceholder: false,
                onChange: function(val){
                    document.querySelector('span.cs-placeholder').style.backgroundColor = val;
                }
            });
        } );

        new FForm( formWrap, {
            onReview : function() {
                classie.add( document.body, 'overview' ); // for demo purposes only
            }
        } );
    })();
</script>
</body>
</html>