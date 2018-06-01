@extends('layout2')
@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
@endsection
@section('barra')
    <li><a href="#" class="md-trigger" data-modal="modal-1">CREAR PREGUNTA</a></li>
@endsection
@section('content')
    <div align="center">
        <h1>Lista de Preguntas</h1>
    </div>
    <div>
        <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
            <thead>
            <tr>
                <td class="sortable-column sort-asc" style="width: 100px">ID</td>
                <td class="sortable-column">Pregunta</td>
                <td>Operaciones</td>
            </tr>
            </thead>
            <tbody id="tab1">
            @forelse($preguntas as $pregunta)
                <tr>
                    <td>{{$pregunta->id}}</td>
                    <td>{{$pregunta->pregunta_pregunta}}</td>
                    <td style="padding: 0px;">
                        {!! csrf_field() !!}
                        <button class="button primary md-trigger" onclick="mostrar({{$pregunta->id}},'{{$pregunta->pregunta_pregunta}}','{{$pregunta->pregunta_foto}}')"><span class="icon mif-info"></span></button>
                        <a href="{{ url('/examenes/'.$pregunta->id.'/editar') }}" class="button success"><span class="icon mif-pencil"></span></a>
                        <button type="button" class="button danger" onclick='confirmar({{$pregunta->id}})'><span class="icon mif-cancel"></span></button>
                    </td>
                </tr>
            @empty
                <h1>error</h1>
            @endforelse
            </tbody>
        </table>
        <br><br>
        <div class="place-right"><a href="{{url('/examenes')}}" class="button fg-white danger">Regresar</a></div>

    </div>


    <div class="md-modal md-effect-7" id="modal-1">
        <div class="md-content" style="height: 430px;">
            <h3>Crear Pregunta</h3>
            <div class="cell">
                <form method="POST" action="{{url('examenes/store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="cell">
                        <label for="nombre">Pregunta: </label>
                        <div class="input-control textarea full-size">
                            <textarea name="pregunta" id="pregunta" cols="10" rows="1"></textarea>
                        </div>
                    </div>
                    <div class="cell">
                        <label for="file">Imagen de pregunta: </label>
                        <div class="input-control file" data-role="input">
                            <input type="file" class="form-control" name="file" >
                            <button class="button"><span class="mif-question"></span></button>
                        </div>
                    </div>
                    <div class="cell">
                        <label for="opciones">Numero de Opciones: </label>
                        <div class="input-control select full-size">
                            <select name="opciones" id="opciones">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="place-left">
                        <button type="submit" class="button success block-shadow-success text-shadow">Crear Pregunta</button>
                    </div>
                </form>

                <div class="place-right">
                    <button class=" button danger md-close">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/examen.js')}}"></script>
@endsection