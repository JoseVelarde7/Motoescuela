@extends('layout')

@section('content')

    <h1 class="text-light">Registrar Nuevo Instructor<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <div class="row">
        <div class="cell colspan1"></div>
        <div class="cell colspan6">
            <form method="POST" action="{{url('instructores/insertar')}}" accept-charset="UTF-8" enctype="multipart/form-data">
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
                    <div class="input-control text full-size">
                        <input type="text" name="ci" value="{{old('ci')}}">
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
                </div>

                <div class="cell place-right">
                    <button type="submit" class="button success block-shadow-success text-shadow">Crear Usuario</button>
                    <a href="{{ url('/instructores/') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>
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
    <script src="{{asset('js/instructores.js')}}"></script>
@endsection