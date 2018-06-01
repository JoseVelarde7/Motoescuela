<h1 align="center">Crear Factura</h1>
<form method="POST" action="{{url('instructores/insertar')}}">
    <div class="cell">
        <label for="razon">Razon Social: </label>
        <div class="input-control text full-size">
            <span class="mif-user prepend-icon"></span>
            <input type="text" name="razon" id="razon">
        </div>
    </div>

    <!--<div class="cell">
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
    </div>-->
</form>