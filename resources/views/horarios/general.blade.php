@extends('layout2')
@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
@endsection
@php
    $colores = array("bg-green fg-white", "bg-pink fg-white", "bg-red fg-white", "bg-orange fg-white", "bg-amber fg-white","bg-yellow fg-white", "bg-amber fg-white","bg-yellow fg-white", "bg-teal fg-white","bg-emerald fg-white");
@endphp
@section('content')
    <div align="center">
        <h1>Horario General</h1>
    </div>
    <div class="grid">
        <div class="row flex-just-center">
            <div class="cell colspan10">
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
                                @php $c=""; @endphp
                                @foreach($cursos as $curso)
                                    @if($curso->horario_nombre=='PERIODO 1')
                                        @php
                                            $c=$c.'<a href="/cursos/'.$curso->id.'" class="button '.$colores[array_rand($colores)].' block-shadow-primary text-shadow">'.$curso->curso_nombre.'</a>';
                                        @endphp
                                    @endif
                                @endforeach
                                <td>@php echo $c; @endphp</td>
                                <td>@php echo $c; @endphp</td>
                                <td>@php echo $c; @endphp</td>
                                <td>@php echo $c; @endphp</td>
                                <td>@php echo $c; @endphp</td>
                            </tr>
                            <tr id="periodo2">
                                <td class="bg-lightRed fg-white">10:30 a 12:30</td>
                                @php $c=""; @endphp
                                @foreach($cursos as $curso)
                                    @if($curso->horario_nombre=='PERIODO 2')
                                        @php
                                            $c=$c.'<a href="/cursos/'.$curso->id.'" class="button '.$colores[array_rand($colores)].' text-shadow">'.$curso->curso_nombre.'</a>';
                                        @endphp
                                    @endif
                                @endforeach
                                @php
                                    for ($i=0;$i<5;$i++){
                                        echo("<td>$c</td>");
                                    }
                                @endphp
                            </tr>
                            <tr id="periodo3">
                                <td  class="bg-lightRed fg-white">14:30 a 16:30</td>
                                @php $c=""; @endphp
                                @foreach($cursos as $curso)
                                    @if($curso->horario_nombre=='PERIODO 3')
                                        @php
                                            $c=$c.'<a href="/cursos/'.$curso->id.'" class="button '.$colores[array_rand($colores)].' text-shadow">'.$curso->curso_nombre.'</a>';
                                        @endphp
                                    @endif
                                @endforeach
                                @php
                                    for ($i=0;$i<5;$i++){
                                        echo("<td>$c</td>");
                                    }
                                @endphp
                            </tr>
                            <tr id="periodo4">
                                <td  class="bg-lightRed fg-white">16:30 a 18:30</td>
                                @php $c=""; @endphp
                                @foreach($cursos as $curso)
                                    @if($curso->horario_nombre=='PERIODO 4')
                                        @php
                                            $c=$c.'<a href="/cursos/'.$curso->id.'" class="button '.$colores[array_rand($colores)].' text-shadow">'.$curso->curso_nombre.'</a>';
                                        @endphp
                                    @endif
                                @endforeach
                                @php
                                    for ($i=0;$i<5;$i++){
                                        echo("<td>$c</td>");
                                    }
                                @endphp
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