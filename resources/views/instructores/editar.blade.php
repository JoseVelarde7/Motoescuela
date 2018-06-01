@extends('layout')

@section('content')

    <h1 class="text-light">Editar Instructor<span class="mif-user place-right"></span></h1>
    <hr class="thin bg-grayLighter"><br><br>
    <div class="row">
        <div class="cell colspan6">
            <form method="POST" action="{{url("instructores/{$instructor->id}")}}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{method_field('PUT')}}
                {!! csrf_field() !!}
                <div class="cell">
                    <label for="nombre">Nombre: </label>
                    <div class="input-control text full-size">
                        <span class="mif-user prepend-icon"></span>
                        <input type="text" name="nombre" id="nombre" value="{{old('nombre',$instructor->inst_nombre)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="celular">Celular: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="celular" id="celular" value="{{old('celular',$instructor->inst_celular)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="direccion">Direccion: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="direccion" value="{{old('direccion',$instructor->inst_direccion)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="ci">Carnet: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="ci" value="{{old('ci',$instructor->inst_ci)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="obs">Observacion: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="obs" value="{{old('obs',$instructor->inst_observacion)}}">
                    </div>
                </div>

                <div class="cell oculto">
                    <label for="nfoto">Nombre foto: </label>
                    <div class="input-control text full-size">
                        <input type="text" name="nfoto" value="{{old('nfoto',$instructor->inst_foto)}}">
                    </div>
                </div>

                <div class="cell">
                    <label for="file">Cambiar Foto: </label>
                    <div class="input-control file" data-role="input">
                        <input type="file" class="form-control" name="file">
                        <button class="button"><span class="mif-folder"></span></button>
                    </div>
                </div>

                <div class="cell place-right">
                    <button type="submit" class="button success block-shadow-success text-shadow">Modificar</button>
                    <a href="{{ url('/instructores') }}" class="button alert block-shadow-alert text-shadow">Regresar</a>
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