<?php $i = 1; $c=0?>
@extends('layout2')
@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
@endsection

@section('nom')
    <span class="dropdown-toggle"><span class="mif-cog"></span>{{$nombre}}</span>
    <h3 style="display: none;">{{$id}}</h3>
@endsection
@section('content')
    <div class="grid">
        <div class="row cells12">
            <div class="cell offset2 colspan8">
                <h3 align="center">EXAMEN ESCRITO NORMAS DE TRANSITO PARA MOTOCICLETA</h3>
                <form method="POST" action="{{url('teoria/insertar')}}" name="frespuestas" id="frespuestas" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="text" name="ide" id="ide" style="display: none;" value="{{$id}}">
                @forelse($preguntas as $pregunta)
                <div class="cell">
                    <hr>
                    <div class="panel collapsed" data-role="panel">
                        <div class="heading">
                            <span class="title">Pregunta {{$i++}}</span>
                        </div>
                        <div class="content padding10">
                            <h3>{{$pregunta->pregunta_pregunta}}</h3>
                            @if(!empty($pregunta->pregunta_foto))
                            <div align="center">
                                <img src="{{asset('storage/'.$pregunta->pregunta_foto)}}" class="actor" style="height: 150px">
                            </div>
                            @endif
                            @while ($pregunta->id==$respuestas[$c]->preguntas_id)
                                <div class="cell colspan-8">
                                    <label class="input-control radio">
                                        <input type="radio" value="{{$respuestas[$c]->id}}" name="{{$pregunta->id}}">
                                        <span class="check"></span>
                                        <span class="caption">{{$respuestas[$c]->opcion_pregunta}}</span>
                                    </label><br>
                                </div>
                                <?php $c++;?>
                                @if(empty($respuestas[$c]->preguntas_id))
                                    @break
                                @endif
                            @endwhile
                        </div>
                    </div>
                </div>
                @empty
                    <h1>error</h1>
                @endforelse
                </form>
                <hr>
                <div class="panel-footer">
                    <div align="center">
                        <button form="frespuestas" type="submit" class="button success block-shadow-success text-shadow">Terminar Examen</button>
                        {{--<a href="#" id="enviar" class="button success">Terminar Examen</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/teoria.js')}}"></script>
@endsection