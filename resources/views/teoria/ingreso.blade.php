
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
</body>
</html>