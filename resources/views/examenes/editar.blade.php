<?php $i = 1; $c=0;?>
@extends('layout2')
@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="grid">
        <div class="row cells12">
            <div class="cell offset2 colspan8">
                <h1 align="center">EDITAR PREGUNTAR</h1>
                <hr>
                <form method="POST" action="{{url("examenes/{$preguntas[0]->id}")}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    {!! csrf_field() !!}
                    <div class="cell">
                        <h3>Imagen: </h3>
                        @if(empty($preguntas[0]->pregunta_foto))
                            <div align="center">
                                <h4>No Cuenta con una fotografia</h4>
                                <label for="file">Agregar una foto</label>
                                <div class="input-control">
                                    <input type="file" class="form-control" name="file" id="file">
                                </div>
                            </div>
                        @else
                            <div align="center">
                                <div align="center"><img src="../../storage/{{$preguntas[0]->pregunta_foto}}" style="height: 200px"></div>
                                <label for="file">Cambiar Foto</label>
                                <div class="input-control">
                                    <input type="file" class="form-control" name="file" id="file">
                                </div>
                            </div>
                        @endif

                        <h3>Pregunta: </h3>
                        <div class="input-control textarea full-size">
                            <textarea name="pregunta" id="pregunta" cols="30" rows="1">{{$preguntas[0]->pregunta_pregunta}}</textarea>
                        </div>
                        <input type="text" name="vfoto" id="vfoto" value="{{$preguntas[0]->pregunta_foto}}" style="display: none;">
                        @forelse($respuestas as $respuesta)
                            <h3>Respuesta: {{$i}}</h3>
                            <div class="input-control textarea full-size">
                                <textarea name="respuesta{{$i}}" id="respuesta{{$i}}" cols="30" rows="1">{{($respuestas[$c]->opcion_pregunta)}}</textarea>
                            </div>
                            <input type="text" name="ide{{$i}}" id="ide{{$i}}" value="{{$respuestas[$c]->id}}" style="display: none;">
                            @if($respuestas[$c]->opcion_respuesta=='CORRECTO')
                                <div class="input-control select">
                                    <select name="valor{{$i}}" id="valor{{$i}}">
                                        <option value="CORRECTO" selected>CORRECTO</option>
                                        <option value="INCORRECTO">INCORRECTO</option>
                                    </select>
                                </div>
                            @else
                                <div class="input-control select">
                                    <select name="valor{{$i}}" id="valor{{$i}}">
                                        <option value="CORRECTO">CORRECTO</option>
                                        <option value="INCORRECTO" selected>INCORRECTO</option>
                                    </select>
                                </div>
                            @endif
                            <?php $i++; $c++?>
                        @empty
                            <h1>Error</h1>
                        @endforelse
                    </div>
                    <div align="center"><button type="submit" class="button success block-shadow-success text-shadow">Modificar</button></div>
                </form>
            </div>
            <br><br>
            <div class="place-right"><a href="{{url('/examenes/crear')}}" class="button fg-white danger">Regresar</a></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/examen.js')}}"></script>
@endsection