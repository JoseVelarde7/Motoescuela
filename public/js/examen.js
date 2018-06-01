$(document).ready(function(){

    $('#menu_examen').attr('class','active');

});

function confirmar(id) {
    metroDialog.create({
        title: "<h1>Desea Borrar la Pregunta?</h1>",
        content: "Esta opción es irreversible",
        actions: [
            {
                title: "Borrar",
                onclick: function(el){
                    var token="{{ csrf_token()}}";
                    $.ajax({
                        url: "/examenes/"+id+"/borrar",
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'GET',
                        dataType: 'json',
                        success: function(){
                            $(el).data('dialog').close();
                            location.href='/examenes/crear';
                        }
                    });
                }

            },
            {
                title: "Cancelar",
                cls: "js-dialog-close"
            }
        ],
        options: {
            //width:'500',
            background:'alert'
        }
    });
}

function mostrar(id,pregunta,foto) {
    var route = "/examenes/pregunta/"+id;
    var ima='';
    if(foto){
        ima='<div align="center"><img src="../../storage/'+foto+'" class="actor" data-position="10,10" style="height: 100px"></div><br>';
    }else{
        ima="";
    }
    //$("#datos").empty();
    $.getJSON(route, function(res){
        var htm='';
        var i=1;
        $(res).each(function(key,value){
            $('#smotos,#smotos2').append("<option value='"+value.id+"'>"+value.moto_marca+"</option>");
            htm=htm+'<div class="listview set-border list">\n' +
                '        <h2><span>'+i+++'</span>\n' +
                '        <span class="list-title">'+value.opcion_pregunta+'</span></h2>\n' +
                '</div>';
        });
        metroDialog.create({
            title: "<h1>"+pregunta+"</h1>",
            content: htm+ima,
            actions: [
                {
                    title: "Cancelar",
                    cls: "js-dialog-close"
                }
            ],
            options: {
                width:'900',
                height:'500',
                background:'info'
            }
        });

    });

}

function mostrar2(id,cadena) {
    var re = cadena.split(",");
    var aciertos=0;
    var errores=0;
    var route = "/examenes/soluciones";
    $.getJSON(route, function(res){
        $.each(re, function( index, value1 ) {
            $.each(res, function( index, value ) {
                if(value1==value.id){
                    if(value.opcion_respuesta=='CORRECTO'){
                        aciertos++;
                    }
                    else{
                        errores++;
                    }
                }
            });
        });
        metroDialog.create({
            title: "<h1>Nota Final</h1>",
            content: "<h1>"+aciertos+"/"+(aciertos+errores)+"</h1>",
            actions: [
                {
                    title: "Cancelar",
                    cls: "js-dialog-close"
                }
            ],
            options: {
                /*width:'600',
                height:'300',*/
                background:'info'
            }
        });
    });

}


