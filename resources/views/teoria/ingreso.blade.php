
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Ingresar al Sistema</title>

    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        .vertical-offset-100{
            padding-top:100px;
        }
    </style>
</head>
@if($resultado!="")
    <div id="ride" style="display: none;">{{$resultado->id}}</div>
    <div id="rrespuesta" style="display: none;">{{$resultado->teoria_respuestas}}</div>
@else
    <div id="ride"></div>
    <div id="rrespuesta"></div>
@endif
<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading" align="center">
                        <h1 class="panel-title">INGRESAR</h1>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{url('/teoria/examen')}}">
                            {!! csrf_field() !!}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nombre" name="nombre" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="C.I." name="carnet" type="password">
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Ingresar">
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div align="center">
                    <a href="/" class="btn btn-danger">RETORNAR</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Resultado del Examen</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1 class="p-3 mb-2 bg-success text-white">Respuestas Correctas  : <span id="correcta"></span></h1>
                    <h1 class="p-3 mb-2 bg-danger text-white">Respuestas Incorrectas  : <span id="incorrecta"></span></h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var ide=$('#ride').text();
            var re=$('#rrespuesta').text();
            if(ide!="" && re!=""){
                mostrar2(ide,re)
            }
        });

        function mostrar2(id,cadena) {
            var re = cadena.split(",");
            var aciertos=0;
            var errores=0;
            var route = "/examenes/soluciones";
            $.getJSON(route, function(res){
                $.each(re, function( index, value1 ) {
                    $.each(res, function( index, value ) {
                        if(value1==value.id){
                            if(value.opcion_respuesta=='CORRECTO'){
                                aciertos++;
                            }
                            else{
                                errores++;
                            }
                        }
                    });
                });
                $('#myModal').modal('show');
                $("#correcta").html(""+aciertos);
                $("#incorrecta").html(""+errores);
            });
        }
    </script>
</body>
</html>