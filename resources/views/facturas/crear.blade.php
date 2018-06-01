@extends('layfactura')

@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="text-light">Crear Factura<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <div class="row">
        <div class="cell colspan1"></div>
        <div class="cell colspan9">
            <div class="wizard2"
                 data-role="wizard2"
                 data-button-labels='{"help": "?", "prev": "<span class=\"mif-arrow-left\"></span>", "next": "<span class=\"mif-arrow-right\"></span>", "finish": "<a href=\"#\" id=\"crear\"><span class=\"mif-checkmark\"></span></a>"}'>
                    <div class="step">
                        <div class="step-content">
                            <form id="formulario" method="POST" action="{{url('horarios/insertar')}}">
                                {!! csrf_field() !!}
                                <div class="cell">
                                    <h4 for="nit">Alumno: </h4>
                                    <div class="input-control select full-size">
                                        <select name="alumno" id="alumno"></select>
                                    </div>
                                </div>

                                <div class="cell">
                                    <h4 for="nit">Nombre del Nit: </h4>
                                    <div class="input-control text full-size">
                                        <input type="text" name="nombrenit" id="nombrenit" value="{{old('nombrenit')}}">
                                    </div>
                                </div>

                                <div class="cell">
                                    <h4 for="nit">Numero de Nit: </h4>
                                    <div class="input-control number full-size">
                                        <input type="number" name="nit" id="nit" value="{{old('nit')}}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-content">
                            <h2 class="no-margin-top">Concepto</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>CANTIDAD</th>
                                        <th>CONCEPTO</th>
                                        <th>MONTO (bs)</th>
                                        <th>SUBTOTAL (bs)</th>
                                    </tr>
                                </thead>
                                <tbody id="cuerpo" style="padding: 0px;">
                                    <tr>
                                        <td>
                                            <div class="input-control number">
                                                <input type="number" name="cantidad1" id="cantidad1" form="formulario" onkeyup="multi(this.name)">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-control text">
                                                <input type="text" name="concepto1" id="concepto1" form="formulario">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-control text">
                                                <input type="text" name="monto1" id="monto1" form="formulario" onkeyup="multi(this.name)">
                                            </div>
                                        </td>
                                        <td id="subtotal1">0</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{--<div class="toolbar place-right">
                                <button class="toolbar-button success" onclick="agregar()"><span class="mif-plus"></span></button>
                                <button class="toolbar-button warning" onclick="quitar()"><span class="mif-minus"></span></button>
                            </div>--}}
                            <div class="place-left input-control text">
                                <label for="total">Total: </label>
                                <input type="text" id="total" name="total" form="formulario" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-content">
                            <h2>Saldo</h2>
                            <div class="input-control number">
                                <input type="number" name="saldo" id="saldo" form="formulario" value="0">
                            </div>
                        </div>
                    </div>
                </div>
            {{--<form method="POST" action="{{url('horarios/insertar')}}">
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
            </form>--}}

        </div>
        {{--<div class="cell colspan3">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="notify alert">
                        <span class="notify-title">
                            {{$error}}
                        </span>
                    </div>
                @endforeach
            @endif
        </div>--}}
    </div>



@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/facturas.js')}}"></script>
@endsection