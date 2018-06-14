$(document).ready(function(){
    $('#menu_horario').attr('class','active');

    $('#sel').on('click',function(e){
        e.preventDefault();
        $('#sel').hide();
        metroDialog.create({
            title: "<h1>Instructor</h1>",
            content: '<div class="cell">\n' +
            '              <div class="input-control select full-size">\n' +
            '                   <select name="instructor" id="instructor"></select>\n' +
            '              </div>\n' +
            '         </div>',
            actions: [
                {
                    title: "Seleccionar",
                    onclick: function(el){
                        var ide=$('#instructor').val();
                        var route = "/horarios/consulta/"+ide;
                        $.getJSON(route, function(res){
                            console.log(res);
                            if(res!=""){
                                $(res).each(function (key,value) {
                                    pintar(value.alumno_nombre,value.horario_nombre);
                                });
                                $('#nNombre').html(`de ${res[0].user_nombre}`);
                            }else{
                                alert("no tiene cursos");
                            }
                            $(el).data('dialog').close();
                        });
                    }

                },
                {
                    title: "Cancelar",
                    cls: "js-dialog-close"
                }
            ],
            options: {
                width:'500',
                background:'info'
            }
        });
        usuarios();
    });

});

function confirmar(id) {
    metroDialog.create({
        title: "<h1>Desea Borrar Horario?</h1>",
        content: "Esta opción es irreversible",
        actions: [
            {
                title: "Borrar",
                onclick: function(el){
                    var token="{{ csrf_token()}}";
                    $.ajax({
                        url: "/horarios/"+id+"/borrar",
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'GET',
                        dataType: 'json',
                        success: function(){
                            $(el).data('dialog').close();
                            location.href='/horarios';
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

function usuarios() {
    var route = "/usuarios/generar";
    $.getJSON(route, function(res){
        $(res).each(function(key,value){
            $('#instructor').append("<option value='"+value.id+"'>"+value.user_nombre+"</option>");
        });
    });
}

function pintar(cursos,horarios) {
    if(horarios=='PERIODO 1'){
        $('#periodo1').append('<td class="hijos"><button class="button warning block-shadow-warning text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button warning block-shadow-warning text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button warning block-shadow-warning text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button warning block-shadow-warning text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button warning block-shadow-warning text-shadow">'+cursos+'</button></td>');
    }
    if(horarios=='PERIODO 2'){
        $('#periodo2').append('<td class="hijos"><button class="button success block-shadow-success text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button success block-shadow-success text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button success block-shadow-success text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button success block-shadow-success text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button success block-shadow-success text-shadow">'+cursos+'</button></td>');
    }
    if(horarios=='PERIODO 3'){
        $('#periodo3').append('<td class="hijos"><button class="button danger block-shadow-danger text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button danger block-shadow-danger text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button danger block-shadow-danger text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button danger block-shadow-danger text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button danger block-shadow-danger text-shadow">'+cursos+'</button></td>');
    }
    if(horarios=='PERIODO 4'){
        $('#periodo4').append('<td class="hijos"><button class="button primary block-shadow-primary text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button primary block-shadow-primary text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button primary block-shadow-primary text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button primary block-shadow-primary text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button primary block-shadow-primary text-shadow">'+cursos+'</button></td>');
    }
    if(horarios=='SABADO 1'){
        $('#fin1').append('<td class="hijos"><button class="button primary block-shadow-primary text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button primary block-shadow-primary text-shadow">'+cursos+'</button></td>');
    }
    if(horarios=='SABADO 2'){
        $('#fin2').append('<td class="hijos"><button class="button primary block-shadow-primary text-shadow">'+cursos+'</button></td>\n' +
            '<td class="hijos"><button class="button primary block-shadow-primary text-shadow">'+cursos+'</button></td>');
    }
}