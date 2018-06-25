<html>
<head>
    <style>
        @page { margin: 180px 50px; }
        #header {
            position: fixed; 
            left: 0px; 
            top: -180px;
            right: 0px; 
            height: 50px; 
            background-color: #0072C6;
            color: #fff;
            text-align: center;
            font-family: "Courier New", Courier, monospace;
        }
        #footer {
            font-family: "Arial";
            position: fixed; 
            left: 0px; 
            bottom: -180px; 
            right: 0px; 
            height: 50px;
            text-align: center;
            color: #fff;
            background-color: #0072C6;
            font-family: "Courier New", Courier, monospace;
        }
        #content{
            padding-top: -140px;
            top: -140px;
            font-family: "Courier New", Courier, monospace;
            font-size: 23px;
        }
        h3{
            font-family: "Courier New", Courier, monospace;
        }
        #footer .page:after { content: counter(page, upper-roman); }
    </style>
<body>
<div id="header">
    <h3>1ra Motoescuela Dakar</h3>
</div>
<div id="footer" align="center">
    <p class="page" align="center"><a href="#"></a></p>
</div>
<div id="content">
    <!--<p><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>-->
    <h1 align="center">Lista de Usuarios</h1>
    <table class="table">
        <thead>
            <tr style="background-color: #00AFF0; color: #fff;">
                <td style="border: hidden">ID</td>
                <td style="border: hidden">Nombre</td>
                <td style="border: hidden">Carnet</td>
                <td style="border: hidden">Celular</td>
                <td style="border: hidden">Cargo</td>
            </tr>
        </thead>
        <tbody>
            @forelse($usuarios as $us)
                <tr style="padding: 10px 5px 5px 10px;">
                    <td>{{$us->id}}</td>
                    <td>{{$us->user_nombre}}</td>
                    <td>{{$us->user_ci}}</td>
                    <td>{{$us->user_celular}}</td>
                    <td>{{$us->user_cargo}}</td>
                </tr>
            @empty
                <h1>error</h1>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
