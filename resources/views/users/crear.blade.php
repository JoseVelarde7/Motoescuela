@extends('layout')

@section('content')

    <h1 class="text-light">Crear Usuario<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <div class="row">
        <div class="cell colspan5">
            <form id="formulario" name="formulario" method="POST" action="{{url('usuarios/insertar')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="cell">
                    <label for="nombre">Nombre: </label>
                    <div class="input-control text full-size">
                        <span class="mif-user prepend-icon"></span>
                        <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
                    </div>
                    @if($errors->first('nombre'))<div class='tag alert'>{{ $errors->first('nombre')}} </div>@endif
                </div>

                <div class="cell">
                    <label for="celular">Celular: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="celular" id="celular" value="{{old('celular')}}">
                    </div>
                    @if($errors->first('celular'))<div class='tag alert'>{{ $errors->first('celular')}} </div>@endif
                </div>

                <div class="cell">
                    <label for="direccion">Direccion: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="direccion" value="{{old('direccion')}}">
                    </div>
                    @if($errors->first('direccion'))<div class='tag alert'>{{ $errors->first('direccion')}} </div>@endif
                </div>

                <div class="cell">
                    <label for="ci">Carnet: </label>
                    <div class="row">
                        <div class="input-control text full-size cell-6">
                            <input type="text" name="ci" value="{{old('ci')}}">
                        </div>
                        <div class="input-control select full-size cell-6">
                            <select name="ext" id="ext" form="formulario">
                                <option value="LP">LA PAZ</option>
                                <option value="OR">ORURO</option>
                                <option value="PT">POTOSI</option>
                                <option value="CBBA">COCHABAMBA</option>
                                <option value="SC">SUCRE</option>
                                <option value="TJ">TARIJA</option>
                                <option value="SCz">SANTA CRUZ</option>
                                <option value="BN">BENI</option>
                                <option value="PN">PANDO</option>
                            </select>
                        </div>
                    </div>
                    @if($errors->first('ci'))<div class='tag alert'>{{ $errors->first('ci')}} </div>@endif
                </div>

                <div class="cell">
                    <label for="obs">Cargo: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="cargo" value="{{old('cargo')}}">
                    </div>
                    @if($errors->first('cargo'))<div class='tag alert'>{{ $errors->first('cargo')}} </div>@endif
                </div>

                <div class="cell">
                    <label for="file">Foto: </label>
                    <div class="input-control file" data-role="input">
                        <input type="file" class="form-control" name="file" >
                        <button class="button"><span class="mif-folder"></span></button>
                    </div>
                </div>

            </form>
        </div>
        <div class="cell colspan1"></div>
        <div class="cell colspan5">
            <div class="cell">
                <label for="celular">Tipo: </label>
                <div class="input-control select full-size">
                    <select name="tipo" id="tipo" form="formulario">
                        <option value="USER1">Administrador</option>
                        <option value="USER2">Usuario 2</option>
                        <option value="USER3">Usuario 3</option>
                    </select>
                </div>
            </div>

            <div class="cell">
                <label for="user">Usuario: </label>
                <div class="input-control text full-size">
                    <input type="text" name="user" form="formulario" value="{{old('user')}}">
                </div>
                @if($errors->first('user'))<div class='tag alert'>{{ $errors->first('user')}} </div>@endif
            </div>

            <div class="cell">
                <label for="pass">Contraseña: </label>
                <div class="input-control text full-size">
                    <input type="text" name="pass" form="formulario" value="{{old('pass')}}">
                </div>
                @if($errors->first('pass'))<div class='tag alert'>{{ $errors->first('pass')}} </div>@endif
            </div>
            <div class="cell place-right">
                <button type="submit" form="formulario" class="button success block-shadow-success text-shadow">Crear Usuario</button>
                <a href="{{ url('/usuarios') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>
            </div>
            {{--@if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="notify alert">
                        <span class="notify-title">
                            {{$error}}
                        </span>
                    </div>
                @endforeach
            @endif--}}
        </div>
    </div>



@endsection
@section('scripts')
    <script src="{{asset('js/users.js')}}"></script>
@endsection