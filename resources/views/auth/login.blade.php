
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />

    <title>Ingresar al Sistema</title>

    <link href="{{asset('css/metro.css')}}" rel="stylesheet">
    <link href="{{asset('css/metro-icons.css')}}" rel="stylesheet">
    <link href="{{asset('css/metro-responsive.css')}}" rel="stylesheet">

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/metro.js')}}"></script>

    <style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

    <script>

        /*
        * Do not use this is a google analytics fro Metro UI CSS
        * */

        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
    </script>
</head>
<body class="bg-darkTeal">

<div class="app-bar" data-role="appbar">
    <a class="app-bar-element branding">1ra Motoescuela Dakar</a>
    <ul class="app-bar-menu">
        <li><a href="{{ url('/ingresar') }}">Examen</a></li>
        <li><a href="{{ url('/asistencias/marcar') }}">Asistencia</a></li>
    </ul>
</div>

<div class="login-form padding20 block-shadow">
    <form method="POST" action="{{route('login')}}">
        {{csrf_field()}}
        <h1 class="text-light">Ingresar al Sistema</h1>
        <hr class="thin"/>
        <br />
        <div class="input-control text full-size {!! $errors->first('error') !!}" data-role="input">
            <label for="user_user">Usuario</label>
            <input type="text" name="user_user" id="user_user" value="{{old('user_user')}}">
            <button class="button helper-button clear"><span class="mif-cross"></span></button>
            {!! $errors->first('user_user','<span class="tag alert">:message</span><br>') !!}
        </div>
        <br />
        <br />
        <div class="input-control password full-size" data-role="input">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="{{old('password')}}">
            <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            {!! $errors->first('password','<span class="tag alert">:message</span><br>') !!}
        </div>
        <br />
        <br />
        <div class="form-actions" align="center">
            <button type="submit" class="button primary">Ingresar</button>
        </div>
    </form>
</div>
</body>
</html>