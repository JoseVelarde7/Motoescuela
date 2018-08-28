@extends('layout')

@section('content')
    <?php
    $extenciones=array(
        array('nombre'=>"LA PAZ",'valor'=>"LP"),
        array('nombre'=>"SANTA CRUZ",'valor'=>"SCZ"),
        array('nombre'=>"COCHABAMBA",'valor'=>"CBBA"),
        array('nombre'=>"ORURO",'valor'=>"OR"),
        array('nombre'=>"POTOSI",'valor'=>"PT"),
        array('nombre'=>"SUCRE",'valor'=>"SC"),
        array('nombre'=>"TARIJA",'valor'=>"TJ"),
        array('nombre'=>"PANDO",'valor'=>"PN"),
        array('nombre'=>"BENI",'valor'=>"BN"),
    );
    ?>
    <h1 class="text-light">Registrar Nuevo Alumno<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <div class="row">
        <div class="cell colspan1"></div>
        <div class="cell colspan6">
            <form method="POST" action="{{url('alumnos/insertar')}}" id="formulario" name="formulario">
                {!! csrf_field() !!}
                <div class="cell">
                    <label for="nombre">Nombre: </label>
                    <div class="input-control text full-size">
                        <span class="mif-user prepend-icon"></span>
                        <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="celular">Celular: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="celular" id="celular" value="{{old('celular')}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="direccion">Direccion: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="direccion" value="{{old('direccion')}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="ci">Carnet: </label>
                    <div class="row">
                        <div class="input-control text full-size cell-6">
                            <input type="text" name="ci" value="{{old('ci')}}">
                        </div>
                        <div class="input-control select full-size cell-6">
                            <select name="ext" id="ext" form="formulario">
                                @foreach($extenciones as $ext)
                                    <option value="{{$ext['valor']}}">{{$ext['nombre']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="cell">
                    <!--<label for="estado">Estado: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="estado">
                    </div>-->
                    <label for="">Estado:</label>
                    <label class="input-control radio">
                        <input type="radio" name="estado" value="1"><br>
                        <span class="check"></span>
                        <span class="caption">Activo</span>
                    </label>
                    <label class="input-control radio">
                        <input type="radio" name="estado" value="0"><br>
                        <span class="check"></span>
                        <span class="caption">Inactivo</span>
                    </label>

                </div>

                <div class="cell place-right">
                    <button type="submit" class="button success block-shadow-success text-shadow">Crear Usuario</button>
                    <a href="{{ url('/alumnos/') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>
                </div>
            </form>
        </div>
        <div class="cell colspan3">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="notify alert">
                        <span class="notify-title">
                            {{$error}}
                        </span>
                    </div>
                @endforeach
            @endif
        </div>
    </div>



@endsection