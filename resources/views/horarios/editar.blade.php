@extends('layout')

@section('content')

    <h1 class="text-light">Editar Horario<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <div class="row">
        <div class="cell colspan6">
            <form method="POST" action="{{url("horarios/{$horario->id}")}}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{method_field('PUT')}}
                {!! csrf_field() !!}

                <div class="cell">
                    <label for="nombre">Nombre: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="nombre" id="nombre" value="{{old('nombre',$horario->horario_nombre)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="entrada">Hora entrada: </label>
                    <div class="input-control time full-size">
                        <input type="time" name="entrada" id="entrada" value="{{old('entrada',$horario->horario_entrada)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="salida">Salida: </label>
                    <div class="input-control time full-size">
                        <input type="time" name="salida" id="salida" value="{{old('salida',$horario->horario_salida)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="dias">Dias: </label>
                    <div class="input-control select full-size">
                        <select name="dias" id="dias" value="{{old('dias')}}">
                            @if($horario->horario_dias=='LUNES A VIERNES')
                            <option value="LUNES A VIERNES" selected>Lunes a Viernes</option>
                                <option value="SABADOS Y DOMINGOS">Sabados y Domingos</option>
                            @else
                            <option value="LUNES A VIERNES" selected>Lunes a Viernes</option>
                            <option value="SABADOS Y DOMINGOS" selected>Sabados y Domingos</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="cell">
                    <label for="ci">Tipo: </label>
                    <div class="input-control select full-size">
                        <select name="tipo" id="tipo">
                            @if($horario->horario_tipo=='REGULAR')
                                <option value="REGULAR" selected>Regular</option>
                                <option value="ACELERADO">Acelerado</option>
                            @else
                                <option value="REGULAR">Regular</option>
                                <option value="ACELERADO" selected>Acelerado</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="cell place-right">
                    <button type="submit" class="button success block-shadow-success text-shadow">Modificar</button>
                    <a href="{{ url('/horarios') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>
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
        <div class="cell colspan1"></div>

    </div>



@endsection
@section('scripts')
    <script src="{{asset('js/instructores.js')}}"></script>
@endsection