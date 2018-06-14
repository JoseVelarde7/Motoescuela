@extends('layout')

@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="text-light">Cursos<span class="mif-file-code place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    {{--<a class="button primary" href="{{url('cursos/crear')}}"><span class="mif-plus"></span> Crear</a>--}}
    @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
    <button class="button primary md-trigger" data-modal="modal-7"><span class="mif-plus"></span> Crear</button>
    <hr class="thin bg-grayLighter">
    @endif
    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='4'>
        <thead>
        <tr>
            <td class="sortable-column sort-asc" style="width: 100px">ID</td>
            <td class="sortable-column">Nombre</td>
            <td class="sortable-column">Estudiantes</td>
            <td class="sortable-column">Entrada</td>
            <td class="sortable-column">Salida</td>
            @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
            <td>Estado</td>
            @endif
            <td>Operaciones</td>
        </tr>
        </thead>
        <tbody id="tab1">
        @forelse($curso as $cu)
            <tr>
                <td>{{$cu->id}}</td>
                <td>{{$cu->curso_nombre}}</td>
                <td>{{$cu->curso_estudiantes}}</td>
                <td>{{$cu->horario_entrada}}</td>
                <td>{{$cu->horario_salida}}</td>
                @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
                    @if($cu->curso_estado=='1')
                        <td><button class="button success" onclick="cerrar({{$cu->id}})">Abierto</button></td>
                    @else
                        <td align="center"><span class="tag alert">Cerrado</span></td>
                    @endif
                @endif

                <td style="padding: 0px;">
                    {!! csrf_field() !!}
                    <a href="{{ url('/cursos/'.$cu->id) }}" class="button primary"><span class="icon mif-info"></span></a>
                    @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
                    @if($cu->curso_estado=='1')
                    <button data-modal="modal-8" class="button success md-trigger" onclick="modificar({{$cu->id}})"><span class="icon mif-pencil"></span></button>
                    <button type="button" class="button danger" onclick='confirmar({{$cu->id}})'><span class="icon mif-cancel"></span></button>
                    @endif
                    @endif
                </td>
            </tr>
        @empty
            <h1>error</h1>
        @endforelse
        </tbody>
    </table>

    {{--<div class="md-modal md-effect-7" id="modal-7">
        <div class="md-content" style="height: 500px;">
            <h3>Crear Curso</h3>
            <div class="cell">
                <form id="formulario1">
                    {!! csrf_field() !!}
                    <div class="cell">
                        <label for="nombre">Nombre del Curso: </label>
                        <div class="input-control text full-size">
                            <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
                        </div>
                    </div>
                    <div class="cell">
                        <label for="moto">Moto Asignada: </label>
                        <div class="input-control select full-size">
                            <select name="smotos" id="smotos"></select>
                        </div>
                    </div>
                    <div class="cell">
                        <label for="horario">Horario:  </label>
                        <div class="input-control select full-size">
                            <select name="horario" id="horario"></select>
                        </div>
                    </div>
                    <div class="cell">
                        <label for="usuario">Instructor: </label>
                        <div class="input-control select full-size">
                            <select name="usuario" id="usuario"></select>
                        </div>
                    </div>
                    <div class="cell">
                        <label for="obs">Observaciones: </label>
                        <div class="input-control text full-size">
                            <input type="text" name="obs" id="obs" value="{{old('obs')}}">
                        </div>
                    </div>
                </form>
                <div class="place-left">
                    <a href="#" id="crearcurso" class="button success">Crear Curso</a>
                </div>
                <div class="place-right">
                    <button class=" button danger md-close">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="md-modal md-effect-7" id="modal-8">
        <div class="md-content" style="height: 500px;">
            <h3>Modificar Curso</h3>
            <div class="cell">
                <form id="formulario2" method="POST">
                    {{method_field('PUT')}}
                    {!! csrf_field() !!}
                    <div class="cell">
                        <label for="nombre2">Nombre del Curso: </label>
                        <div class="input-control text full-size">
                            <input type="text" name="nombre2" id="nombre2">
                        </div>
                    </div>
                    <div class="cell">
                        <label for="moto2">Moto Asignada: </label>
                        <div class="input-control select full-size">
                            <select name="smotos2" id="smotos2"></select>
                        </div>
                    </div>
                    <div class="cell">
                        <label for="horario2">Horario:  </label>
                        <div class="input-control select full-size">
                            <select name="horario2" id="horario2"></select>
                        </div>
                    </div>
                    <div class="cell">
                        <label for="usuario2">Instructor: </label>
                        <div class="input-control select full-size">
                            <select name="usuario2" id="usuario2"></select>
                        </div>
                    </div>
                    <div class="cell">
                        <label for="obs2">Observaciones: </label>
                        <div class="input-control text full-size">
                            <input type="text" name="obs2" id="obs2">
                        </div>
                    </div>
                    <input type="text" name="ide" id="ide" style="display: none;">
                </form>
                <div class="place-left">
                    <a href="#" id="modificarcurso" class="button success">Modificar Curso</a>
                </div>
                <div class="place-right">
                    <button class=" button danger md-close">Cerrar</button>
                </div>
            </div>
        </div>
    </div>--}}

@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/cursos.js')}}"></script>
@endsection
