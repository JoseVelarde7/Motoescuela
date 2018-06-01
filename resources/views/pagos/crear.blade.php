@extends('layout')

@section('content')

    <h1 class="text-light">Registrar Motocicleta<span class="mif-motorcycle place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <div class="row">
        <div class="cell colspan1"></div>
        <div class="cell colspan6">
            <form id="formulario" method="POST" action="{{url('motos/insertar')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="cell">
                    <label for="marca">Marca: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="marca" id="marca" value="{{old('marca')}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="tipo">Tipo: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="tipo" id="tipo" value="{{old('tipo')}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="modelo">Modelo: </label>
                    <div class="input-control select full-size">
                        {{--<input type="text" name="modelo" value="{{old('modelo')}}">--}}
                        <select name="modelo" value="{{old('modelo')}}">
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                        </select>
                    </div>
                </div>

                <div class="cell">
                    <label for="placa">Placa: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="placa" value="{{old('placa')}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="color">Color: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="color" value="{{old('color')}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="obs">Observacion: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="obs" value="{{old('obs')}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="file">Foto: </label>
                    <div class="input-control file" data-role="input">
                        <input type="file" class="form-control" name="file" >
                        <button class="button"><span class="mif-folder"></span></button>
                    </div>
                    <div class="cell place-right" >
                        <button type="submit" class="button success block-shadow-success text-shadow">Registrar</button>
                        <a href="{{ url('/motos') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>
                    </div>
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
@section('scripts')
    <script src="{{asset('js/motos.js')}}"></script>
@endsection