@extends('layout')

@section('content')

    <h1 class="text-light">Registrar Nuevo Horario<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <div class="row">
        <div class="cell colspan1"></div>
        <div class="cell colspan6">
            <form method="POST" action="{{url('horarios/insertar')}}">
                {!! csrf_field() !!}

                <div class="cell">
                    <label for="nombre">Nombre: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="entrada">Hora entrada: </label>
                    <div class="input-control time full-size">
                        <input type="time" name="entrada" id="entrada" value="{{old('entrada')}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="salida">Salida: </label>
                    <div class="input-control time full-size">
                        <input type="time" name="salida" id="salida" value="{{old('salida')}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="dias">Dias: </label>
                    <div class="input-control select full-size">
                        <select name="dias" id="dias">
                            <option value="LUNES A VIERNES">Lunes a Viernes</option>
                            <option value="SABADOS Y DOMINGOS">Sabados y Domingos</option>
                        </select>
                    </div>
                </div>

                <div class="cell">
                    <label for="ci">Tipo: </label>
                    <div class="input-control select full-size">
                        <select name="tipo" id="tipo">
                            <option value="REGULAR">Regular</option>
                            <option value="ACELERADO">Acelerado</option>
                        </select>
                    </div>
                </div>

                <div class="cell place-right">
                    <button type="submit" class="button success block-shadow-success text-shadow">CREAR</button>
                    <a href="{{ url('/horarios') }}" class="button alert block-shadow-alert text-shadow">REGRESAR</a>
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