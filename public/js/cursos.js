$('#menu_curso').attr('class','active');
$('.oculto').hide();
motos();
horarios();
usuarios();

$('#crearcurso').on('click',function(e){
    e.preventDefault();
    var horario=$("#horario").val();
    var usuario=$('#usuario').val();

    validar(function (res1) {
        if(res1==""){
            var fo=$('#formulario1').serialize();
            var token="{{ csrf_token()}}";
            $.ajax({
                url: "/cursos/crear",
                headers: {'X-CSRF-TOKEN': token},
                type: 'POST',
                data:fo,
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    alert(res.mensaje);
                    location.href='/cursos';
                }
            });
        }else{
            alert("El Instructor ya tiene un curso con ese horario")
        }
    },horario,usuario);

});

$('#modificarcurso').on('click',function(e){
    e.preventDefault();
    var fo2=$('#formulario2').serialize();
    var id2=$('#ide').val();
    var token="{{ csrf_token()}}";
    $.ajax({
        url: "/cursos/"+id2,
        headers: {'X-CSRF-TOKEN': token},
        type: 'put',
        data:fo2,
        dataType: 'json',
        success: function(res){
            console.log(res);
            alert(res.mensaje)
            location.href='/cursos';
        }
    });
});

function modificar(id) {
    var route = "/cursos/buscar/"+id;
    $.getJSON(route, function(res){
        $(res).each(function(key,value){
            console.log(value.inscripcion_estado);
            $('#nombre2').attr('value',value.alumno_nombre);
            $("#smotos2").val(value.moto_id);
            $("#horario2").val(value.horario_id);
            $("#usuario2").val(value.user_id);
            $("#estado").val(value.inscripcion_estado);
            $('#obs2').attr('value',value.curso_observacion);
            $('#ide').attr('value',value.id);
        });
    });
}

function motos() {
    var route = "/cursos/moto";
    $("#datos").empty();
    $.getJSON(route, function(res){
        //console.log(res);
        $(res).each(function(key,value){
            $('#smotos,#smotos2').append("<option value='"+value.id+"'>"+value.moto_marca+"</option>");
        });
    });
}

function horarios() {
    var route = "/cursos/horario";
    $("#datos").empty();
    $.getJSON(route, function(res){
        $(res).each(function(key,value){
            $('#horario,#horario2').append("<option value='"+value.id+"'>"+value.horario_nombre+" de "+value.horario_entrada+" a "+value.horario_salida+"</option>");
        });
    });
}

function usuarios() {
    var route = "/usuarios/generar";
    $.getJSON(route, function(res){
        $(res).each(function(key,value){
            $('#usuario,#usuario2').append("<option value='"+value.id+"'>"+value.user_nombre+"</option>");
        });
    });
}

function confirmar(id) {
    metroDialog.create({
        title: "<h1>Desea Borrar Curso?</h1>",
        content: "Esta opción es irreversible",
        actions: [
            {
                title: "Borrar",
                onclick: function(el){
                    var token="{{ csrf_token()}}";
                    $.ajax({
                        url: "/cursos/"+id+"/borrar",
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'GET',
                        dataType: 'json',
                        success: function(res){
                            console.log(res);
                            $(el).data('dialog').close();
                            location.href='/cursos';
                        },
                        error: function() {
                            metroDialog.create({
                                title: "<h1>No se Puede Eliminar este Curso</h1>",
                                content: "Tiene alumnos inscritos",
                                actions: [
                                    {
                                        title: "Aceptar",
                                        cls: "js-dialog-close"
                                    }
                                ],
                                options: {
                                    //width:'500',
                                    background:'alert'
                                }
                            });
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

function cerrar(id) {
    metroDialog.create({
        title: "<h1>Desea Cerrar el Curso?</h1>",
        content: "Esta opción es irreversible",
        actions: [
            {
                title: "Cerrar Curso",
                onclick: function(el){
                    var token="{{ csrf_token()}}";
                    $.ajax({
                        url: "/cursos/"+id+"/estado",
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'GET',
                        dataType: 'json',
                        success: function(){
                            $(el).data('dialog').close();
                            location.href='/cursos';
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
            background:'warning'
        }
    });
}

function validar(callback,horario,usuario) {
    var route = "/horarios/validar/"+usuario+"/"+horario;
    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'json',
        success: function(data){
            callback(data);
        }
    });
}
