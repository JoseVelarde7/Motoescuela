@extends('layout2')
@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
@endsection
@section('barra')
    <li><a href="#" id="sel" name="sel" class="md-trigger success">BUSCAR</a></li>
    <li><a href="{{ url('/horarios/instructores') }}" id="sel" name="sel" class="md-trigger success">NUEVA BUSQUEDA</a></li>
@endsection
@section('content')
    <div align="center">
        <h1>Horarios Semanal <span id="nNombre"></span></h1>
    </div>

    <div class="grid">
        <div class="row flex-just-center">
            <div class="cell colspan8">
                <table class="table bordered hovered">
                    <thead>
                    <tr>
                        <th class="bg-lighterBlue fg-white">Horario</th>
                        <th class="bg-lighterBlue fg-white">Lunes</th>
                        <th class="bg-lighterBlue fg-white">Martes</th>
                        <th class="bg-lighterBlue fg-white">Miercoles</th>
                        <th class="bg-lighterBlue fg-white">Jueves</th>
                        <th class="bg-lighterBlue fg-white">Viernes</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr id="periodo1">
                            <td class="bg-lightRed fg-white size4">08:30 a 10:30</td>
                        </tr>
                        <tr id="periodo2">
                            <td class="bg-lightRed fg-white">10:30 a 12:30</td>
                        </tr>
                        <tr id="periodo3">
                            <td  class="bg-lightRed fg-white">14:30 a 16:30</td>
                        </tr>
                        <tr id="periodo4">
                            <td  class="bg-lightRed fg-white">16:30 a 18:30</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>

    <div align="center">
        <h1>Horarios Fin de Semana <span id="nNombre"></span></h1>
    </div>

    <div class="grid">
        <div class="row flex-just-center">
            <div class="cell colspan8">
                <table class="table bordered hovered">
                    <thead>
                    <tr>
                        <th class="bg-lighterBlue fg-white">Horario</th>
                        <th class="bg-lighterBlue fg-white">Sábado</th>
                        <th class="bg-lighterBlue fg-white">Domingo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="fin1">
                        <td class="bg-lightRed fg-white size4">08:00 a 12:30</td>
                    </tr>
                    <tr id="fin2">
                        <td class="bg-lightRed fg-white">14:00 a 18:00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div align="center" class="pull-right">
            <a class="button danger" href="{{url('horarios')}}"><span class="mif-backward"></span> Regresar</a>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/horarios.js')}}"></script>
@endsection