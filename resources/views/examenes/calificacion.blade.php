<?php $i = 1; $c=0; $d=0; $n=1;?>
@extends('layout2')
@section('estilos')
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
@endsection

<?php $array = explode(",", $resp1[0]->teoria_respuestas);?>

@section('content')
    <div class="grid" id="HTMLtoPDF">
        <h1 align="center">Hoja de Respuestas</h1>
        <div class="row cells12">
            <div class="cell offset2 colspan8">
                <h3>Fecha de examen: {{$resp1[0]->teoria_fecha}}</h3>
                <h3>Nombre: {{$resp1[0]->alumno_nombre}}</h3>
                <div class="tag success">Respuesta Correcta</div>
                <span class="tag alert">Respuesta Incorrecta</span>
                @forelse($preguntas as $pregunta)
                    <div class="cell">
                        <hr>
                        <div class="panel" data-role="panel">
                            <div class="heading">
                                <span class="title">Pregunta {{$i++}}</span>
                            </div>
                            <div class="content padding10">
                                <h3>{{$pregunta->pregunta_pregunta}}</h3>
                                @if(!empty($pregunta->pregunta_foto))
                                    <div align="center">
                                        <img src="{{asset('storage/'.$pregunta->pregunta_foto)}}" class="actor" style="height: 150px">
                                    </div>
                                @endif
                                @while ($pregunta->id==$respuestas[$c]->preguntas_id)
                                    <div class="cell colspan-8">
                                        @if($respuestas[$c]->opcion_respuesta=='CORRECTO')
                                            <div class="list">
                                                <li class="bg-green fg-white padding10 text-shadow">{{$respuestas[$c]->opcion_pregunta}}</li>
                                            </div>
                                        @else
                                            @if($respuestas[$c]->id==$array[$d])
                                                <div class="list">
                                                    <li class="bg-lightRed fg-white padding10 text-shadow">{{$respuestas[$c]->opcion_pregunta}}</li>
                                                </div>
                                                <?php $n++;?>
                                            @else
                                                <div class="list">
                                                    <li class="bg-white fg-black padding10 text-shadow">{{$respuestas[$c]->opcion_pregunta}}</li>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    <?php $c++;?>
                                    @if(empty($respuestas[$c]->preguntas_id))
                                        @break
                                    @endif
                                @endwhile
                                <?php $d++;?>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1>error</h1>
                @endforelse
                <hr>
                <h3>Respuestas Incorrectas {{$n-1}}</h3>
                <h3>Respuestas Correctas {{$i-($n)}}</h3>
                <hr>
                <div align="center">
                    <a href="{{url('download-pdf/'.$resp1[0]->id)}}" class="button success">Imprimir</a>
                    <a href="{{url('/examenes/resultados')}}" class="button fg-white danger">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/modalEffects.js')}}"></script>
    <script src="{{asset('js/teoria.js')}}"></script>
    <script src="{{asset('js/jspdf.js')}}"></script>
    <script src="{{asset('js/html2canvas.js')}}"></script>
    <script>
        function genPDF(){
            /*html2canvas(document.getElementById('HTMLtoPDF'),{
                onrendered:function(canvas){
                    var img=canvas.toDataURL("image/png");
                    var doc=new jsPDF();
                    doc.addImage(img,'JPEG',20,20);
                    doc.save('test.pdf');
                }
            });*/
            html2canvas(document.getElementById('HTMLtoPDF')).
                then(function(canvas){
                var imgData=canvas.toDataURL("image/png");
                var imgWidth = 210;
                var pageHeight = 295;
                var pageHeight = 295;
                var imgHeight = canvas.height * imgWidth / canvas.width;
                var heightLeft = imgHeight;

                var doc = new jsPDF('p', 'mm');
                var position = 0;

                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    doc.addPage();
                    doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }
                doc.save('jhjh.pdf');
            });
        }
    </script>
@endsection