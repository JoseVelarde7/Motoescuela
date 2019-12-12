<html>
<head>
  <style>
    @page { margin: 180px 50px; }
    #header {
      position: fixed;
      left: -50px;
      top: -180px;
      right: -50px;
      height: 50px;
      background-color: #0072C6;
      color: #fff;
      text-align: center;
      font-family: "Times New Roman", Times, serif;
    }
    #footer {
      position: fixed;
      left: -50px;
      bottom: -180px;
      right: -50px;
      height: 50px;
      text-align: center;
      color: #fff;
      background-color: #0072C6;
      font-family: "Times New Roman", Times, serif;
    }
    #content{
      padding-top: -140px;
      top: -140px;
      font-family: "Times New Roman", Times, serif;
      font-size: 12px;
    }
    h3{
      font-family: "Times New Roman", Times, serif;
    }
    #footer .page:after { content: counter(page, upper-roman); }
    .table{
      width: 100%;
    }

    table.timecard {
      margin: auto;
      /*width: 600px;*/
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #fff; /*for older IE*/
      border-style: hidden;
    }

    table.timecard caption {
      background-color: #f79646;
      color: #fff;
      font-size: x-large;
      font-weight: bold;
      letter-spacing: .3em;
    }

    table.timecard thead th {
      padding: 8px;
      background-color: #fde9d9;
      font-size: large;
    }

    /*table.timecard thead th#thDay {
        width: 40%;
    }*/

    table.timecard th, table.timecard td {
      padding: 3px;
      border-width: 1px;
      border-style: solid;
      border-color: #f79646 #ccc;
    }

    table.timecard td {
      text-align: left;
    }

    table.timecard tbody th {
      text-align: center;
      font-weight: normal;
    }

    table.timecard tfoot {
      font-weight: bold;
      font-size: large;
      background-color: #687886;
      color: #fff;
    }

    table.timecard tr.even {
      background-color: #fde9d9;
    }
  </style>
<body>
<div id="header">
  <table>
    <tr>
      <td width="400">
        <h4>1ra Motoescuela Dakar</h4>
      </td>
      <td width="200"></td>
      <td width="200">Fecha: {{  date("d-m-Y H:i:s") }}</td>
    </tr>
  </table>
</div>
<div id="footer" align="center">
  <p class="page" align="center"><a href="#"></a></p>
</div>
<div id="content">
  <!--<p><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
  <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>-->
  <h2 align="center">Reporte de Alumnos</h2>
  <table class="timecard">
    <thead>
    <tr style="background-color: #f79646; color: #fff; font-size: 18px; font-weight: bold;">
      <td style="border: hidden" id="thid">ID</td>
      <td style="border: hidden" id="thnombre">Nombre</td>
      <td style="border: hidden" id="thcarnet">Carnet</td>
      <td style="border: hidden" id="thcelular">Celular</td>
      <td style="border: hidden" id="thdireccion">Dirección</td>
      <td style="border: hidden" id="thestado">Estado</td>
    </tr>
    </thead>
    <tbody>
    @php
      $i=0;
    @endphp

    @forelse($alumnos as $us)
      @php
        $j=$i % 2;
      @endphp
      @if($j==0)
        <tr class="odd">
          <td>{{$us->id}}</td>
          <td>{{$us->alumno_nombre}}</td>
          <td>{{$us->alumno_ci}}</td>
          <td>{{$us->alumno_celular}}</td>
          <td>{{$us->alumno_direccion}}</td>
          @if($us->alumno_activo)
            <td>Activo</td>
          @else
            <td>Inactivo</td>
          @endif
        </tr>
      @else
        <tr class="even">
          <td>{{$us->id}}</td>
          <td>{{$us->alumno_nombre}}</td>
          <td>{{$us->alumno_ci}}</td>
          <td>{{$us->alumno_celular}}</td>
          <td>{{$us->alumno_direccion}}</td>
          @if($us->alumno_activo)
            <td>Activo</td>
          @else
            <td>Inactivo</td>
          @endif
        </tr>
      @endif
      @php
        $i++;
      @endphp
    @empty
      <h1>error</h1>
    @endforelse
    </tbody>
  </table>
</div>
</body>
</html>
