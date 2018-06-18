<?php $i = 1; $c=0; $d=0; $n=1;?>
<?php $array = explode(",", $resp1[0]->teoria_respuestas);?>
<style>
    .bien{
        border-bottom: 1px solid green;
    }
    .mal{
        border-bottom: 1px solid red;
    }
</style>
    <div class="grid" id="HTMLtoPDF">
        <h1 align="center">Hoja de Respuestas</h1>
        <div class="row cells12">
            <div class="cell offset2 colspan8">
                <h3>Fecha de examen: {{$resp1[0]->teoria_fecha}}</h3>
                <h3>Nombre: {{$resp1[0]->alumno_nombre}}</h3>
                <div style="background: #2d572c;">Respuesta Correcta</div>
                <div style="background: #ff0000">Respuesta Incorrecta</div>
                <hr>
                @forelse($preguntas as $pregunta)
                    <h3 class="title">Pregunta {{$i++}}</h3>
                    <h5>{{$pregunta->pregunta_pregunta}}</h5>

                    @while ($pregunta->id==$respuestas[$c]->preguntas_id)
                        <ul>
                            @if($respuestas[$c]->opcion_respuesta=='CORRECTO')
                                <li class="bien">{{$respuestas[$c]->opcion_pregunta}}</li>
                            @else
                                @if($respuestas[$c]->id==$array[$d])
                                    <li class="mal">{{$respuestas[$c]->opcion_pregunta}}</li>
                                    <?php $n++;?>
                                @else
                                    <li>{{$respuestas[$c]->opcion_pregunta}}</li>
                                @endif
                            @endif
                        </ul>
                        <?php $c++;?>
                        @if(empty($respuestas[$c]->preguntas_id))
                            @break
                        @endif
                    @endwhile
                    <?php $d++;?>
                @empty
                    <h1>error</h1>
                @endforelse
                <hr>
                <h3>Respuestas Incorrectas {{$n-1}}</h3>
                <h3>Respuestas Correctas {{$i-($n)}}</h3>
            </div>
        </div>
    </div>
