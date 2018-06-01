@extends('layout')

@section('content')

    <h1 class="text-light">Editar Usuario<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <div class="row">
        <div class="cell colspan5">
            <form id="formulario" name="formulario" method="POST" action="{{url("usuarios/{$user->id}")}}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{method_field('PUT')}}
                {!! csrf_field() !!}
                <div class="cell">
                    <label for="nombre">Nombre: </label>
                    <div class="input-control text full-size">
                        <span class="mif-user prepend-icon"></span>
                        <input type="text" name="nombre" id="nombre" value="{{old('nombre',$user->user_nombre)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="celular">Celular: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="celular" id="celular" value="{{old('celular',$user->user_celular)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="direccion">Direccion: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="direccion" value="{{old('direccion',$user->user_direccion)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="ci">Carnet: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="ci" value="{{old('ci',$user->user_ci)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="obs">Cargo: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="cargo" value="{{old('cargo',$user->user_cargo)}}">
                    </div>
                </div>

                <div class="cell oculto">
                    <label for="nfoto">Nombre foto: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="nfoto" value="{{old('nfoto',$user->user_foto)}}">
                    </div>
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
                        @if($user->tipo=='ADMINISTRADOR')
                            <option value="USER1" selected>Administrador</option>
                            <option value="USER2">Usuario 2</option>
                            <option value="USER3">Usuario 3</option>
                        @elseif($user->tipo=='USUARIO 2')
                            <option value="USER1">Administrador</option>
                            <option value="USER2" selected>Usuario 2</option>
                            <option value="USER3">Usuario 3</option>
                        @else
                            <option value="USER1">Administrador</option>
                            <option value="USER2">Usuario 2</option>
                            <option value="USER3" selected>Usuario 3</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="cell">
                <label for="user">Usuario: </label>
                <div class="input-control text full-size">
                    <input type="text" name="user" form="formulario" value="{{old('user',$user->user_user)}}">
                </div>
            </div>

            <div class="cell">
                <label for="pass">Contraseña: </label>
                <div class="input-control text full-size">
                    <input type="text" name="pass" form="formulario" value="{{old('pass',$user->user_pass)}}">
                </div>
            </div>
            <div class="cell place-right">
                <button type="submit" form="formulario" class="button success block-shadow-success text-shadow">MODIFICAR</button>
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