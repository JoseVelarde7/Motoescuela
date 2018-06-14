@extends('layout')
@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
@endsection
@section('content')


    <h1 class="text-light">Inscripciones<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <a class="button primary" href="{{url('inscripciones/crear')}}"><span class="mif-plus"></span> Crear</a>
    <hr class="thin bg-grayLighter">
    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false" data-order='[[ 0, "dec" ]]' data-page-length='6'>
        <thead>
        <tr>
            <td class="sortable-column sort-asc" style="width: 100px">ID</td>
            <td class="sortable-column">Fecha</td>
            <td class="sortable-column">Alumno</td>
            <td>Estado</td>
            <td>Operaciones</td>
        </tr>
        </thead>
        <tbody>
        @forelse($inscripcion as $inst)
            <tr>
                <td>{{$inst->id}}</td>
                <td>{{$inst->ins_fecha}}</td>
                <td>{{$inst->alumno_nombre}}</td>
                @if($inst->inscripcion_estado==1)
                    <td><span class="tag success">Activo</span></td>
                @else
                    <td><span class="tag alert">Inactivo</span></td>
                @endif
                <td style="padding: 0px;">
                    {!! csrf_field() !!}
                    <a class="demo01" href="#animatedModal" onclick="mostrar({{$inst->id}})" class="button primary"><span class="mif-search"></span>Ver</a>
                    <button data-modal="modal-8" class="button success md-trigger" onclick="modificar({{$inst->id}})"><span class="icon mif-pencil"></span></button>
                    @if($inst->inscripcion_estado==1)
                    <button type="button" class="button danger" onclick='confirmar({{$inst->id}})'><span class="icon mif-cancel"></span></button>
                    @endif
                </td>
            </tr>
        @empty
            <h1>error</h1>
        @endforelse
        </tbody>
    </table>

    <div class="md-modal md-effect-7" id="modal-8">
        <div class="md-content" style="height: 600px;">
            <h3>Modificar Inscripcion</h3>
            <div class="cell">
                <form id="formulario2" method="POST">
                    {{method_field('PUT')}}
                    {!! csrf_field() !!}
                    <div class="cell">
                        <label for="nombre2">Nombre del Alumno: </label>
                        <div class="input-control text full-size">
                            <input type="text" name="nombre2" id="nombre2" readonly>
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
                        <label for="estado">Estado: </label>
                        <div class="input-control select full-size">
                            <select name="estado" id="estado">
                                <option value="0" id="inactivo">Inactivo</option>
                                <option value="1" id="activo">Activo</option>
                            </select>
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
                    <a href="#" id="modificarins" class="button success">Modificar Inscripción</a>
                </div>
                <div class="place-right">
                    <button class=" button danger md-close">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div id="animatedModal">
        <div class="modal-content">
            <div class="grid condensed">
                <div class="row cells12">
                    <div class="cell colspan1"></div>
                    <div class="cell colspan10">
                        <div class="panel">
                            <div class="heading">
                                <span class="title">Información de la Inscripción</span>
                                <a href="#" id="btn-close-modal" class="place-right fg-white close-animatedModal"><span class="icon mif-cancel mif-2x"></span></a>
                            </div>
                            <div class="content bg-white padding10">
                                <h1 align="center" id="ncurso"></h1>
                                <div class="cell">
                                    <h1>Alumno: <span id="nalumno"></span></h1>
                                </div>
                                <div class="grid">
                                    <div class="row cells12">
                                        <div class="cell colspan3">
                                            <div class="panel success" align="center">
                                                <div class="heading">Horarios</div>
                                                <h3 id="entrada"></h3>
                                            </div>
                                        </div>
                                        <div class="cell colspan3">
                                            <div class="paper">
                                                <img id="nfoto" class="poster"/>
                                                <h3>Instructor</h3>
                                                <h3 id="nistructor"></h3>
                                                <hr/>
                                                <div class="space"></div>
                                            </div>
                                        </div>
                                        <div class="cell colspan3">
                                            <div class="paper">
                                                <img id="nfoto2" class="poster"/>
                                                <h3>Moto</h3>
                                                <h3 id="nmoto"></h3>
                                                <hr/>
                                                <div class="space"></div>
                                            </div>
                                        </div>
                                        <div class="cell colspan3">
                                            <div class="panel info-box" align="center">
                                                <div class="heading">Estado</div>
                                                <div class="estados"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="cell colspan1"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/animatedModal.min.js')}}"></script>
    <script src="{{asset('js/inscripciones.js')}}"></script>
    <script>
        //$("#demo01").animatedModal();
        $(".demo01").animatedModal({
            modalTarget:'animatedModal',
            animatedIn:'lightSpeedIn',
            animatedOut:'bounceOutDown',
            color:'#fff',
            beforeOpen: function() {
            },
            afterOpen: function() {
            },
            beforeClose: function() {
            },
            afterClose: function() {
            }
        });
    </script>
@endsection
