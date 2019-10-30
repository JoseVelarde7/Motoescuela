{{--<?php $i = 1; $c=0?>--}}
<?php
    $nombre = Session::get('nombre');
    /*$id = Session::get('id');*/
?>
<h1>
    {{$nombre}}
</h1>