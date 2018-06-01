@extends('layout')

@section('content')

    <h1 class="text-light">Editar Alumno<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <div class="row">
        <div class="cell colspan1"></div>
        <div class="cell colspan6">
            <form method="POST" action="{{url("alumnos/{$alumno->id}")}}">
                {{method_field('PUT')}}
                {!! csrf_field() !!}
                <div class="cell">
                    <label for="nombre">Nombre: </label>
                    <div class="input-control text full-size">
                        <span class="mif-user prepend-icon"></span>
                        <input type="text" name="nombre" id="nombre" value="{{old('nombre',$alumno->alumno_nombre)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="celular">Celular: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="celular" id="celular" value="{{old('celular',$alumno->alumno_celular)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="direccion">Direccion: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="direccion" value="{{old('direccion',$alumno->alumno_direccion)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="ci">Carnet: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="ci" value="{{old('ci',$alumno->alumno_ci)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="">Estado:</label>
                    @if(($alumno->alumno_activo==1))
                        <label class="input-control radio">
                            <input type="radio" name="estado" value="1" checked><br>
                            <span class="check"></span>
                            <span class="caption">Activo</span>
                        </label>
                        <label class="input-control radio">
                            <input type="radio" name="estado" value="0"><br>
                            <span class="check"></span>
                            <span class="caption">Inactivo</span>
                        </label>
                    @endif
                    @if(($alumno->alumno_activo==0))
                        <label class="input-control radio">
                            <input type="radio" name="estado" value="1"><br>
                            <span class="check"></span>
                            <span class="caption">Activo</span>
                        </label>
                        <label class="input-control radio">
                            <input type="radio" name="estado" value="0"  checked><br>
                            <span class="check"></span>
                            <span class="caption">Inactivo</span>
                        </label>
                    @endif
                </div>

                <div class="cell place-right">
                    <button type="submit" class="button success block-shadow-success text-shadow">Actualizar Usuario</button>
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