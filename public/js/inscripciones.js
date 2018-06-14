$(document).ready(function(){
    $('#menu_ins').attr('class','active');
    alumnos();
    motos();
    horarios();
    usuarios();
    $('#alumno').select2();
    //mostrar("id");
    $('#modificarins').on('click',function(e){
        e.preventDefault();
        var fo2=$('#formulario2').serialize();
        var id2=$('#ide').val();
        var token="{{ csrf_token()}}";
        $.ajax({
            url: "/inscripciones/"+id2,
            headers: {'X-CSRF-TOKEN': token},
            type: 'put',
            data:fo2,
            dataType: 'json',
            success: function(res){
                console.log(res);
                alert(res.mensaje)
                location.href='/inscripciones';
            }
        });
    });

    $('#registrari').on('click',function(e){
        e.preventDefault();
        var horario=$("#horario").val();
        var usuario=$('#usuario').val();
        var moto=$('#smotos').val();
        validar(function (res1) {
            console.log(res1);
            if(res1=="correcto"){
                var fo=$('#formu').serialize();
                var token="{{ csrf_token()}}";
                $.ajax({
                    url: "/inscripciones/insertar",
                    headers: {'X-CSRF-TOKEN': token},
                    type: 'POST',
                    data:fo,
                    dataType: 'json',
                    success: function(res){
                        console.log(res);
                        alert(res.mensaje);
                        location.href='/inscripciones';
                    }
                });
            }else{
                alert(res1);
            }
        },horario,usuario,moto);
    });
});

function validar(callback,horario,usuario,moto) {
    var route = "/inscripciones/validar/"+usuario+"/"+horario+"/"+moto;
    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'json',
        success: function(data){
            callback(data);
        }
    });
}

function modificar(id) {
    var route = "/inscripciones/buscar/"+id;
    $.getJSON(route, function(res){
        $(res).each(function(key,value){
            $('#nombre2').attr('value',value.alumno_nombre);
            $("#smotos2").val(value.moto_id);
            $("#horario2").val(value.horario_id);
            $("#usuario2").val(value.user_id);
            $("#estado").val(value.inscripcion_estado);
            $('#obs2').attr('value',value.ins_obs);
            $('#ide').attr('value',value.id);
        });
    });
}
function mostrar(id) {
    var route = "/inscripciones/generar/"+id;
    $.getJSON(route, function(res){
        $(res).each(function(key,value){
            $('#nalumno').html(value.alumno_nombre);
            $('#nistructor').html(value.user_nombre);
            $('#nfoto').attr("src","/storage/"+value.user_foto);
            $('#nmoto').html(value.moto_marca);
            $('#nfoto2').attr("src","/storage/"+value.moto_foto);
            $('#entrada').html(value.horario_dias+" de "+value.horario_entrada+" a "+value.horario_salida);
            if(value.inscripcion_estado==1){
                $('.estados').html('<h3>Activo</h3>');
            }else{
                $('.estados').html('<h3>Inactivo</h3>');
            }
        });
    });
}
function cursos() {
    var route = "/cursos/generar2";
    $.getJSON(route, function(res){
        $(res).each(function(key,value){
            $('#curso2').append("<option value='"+value.id+"'>"+value.curso_nombre+" Estudiantes "+value.curso_estudiantes+"</option>");
        });
    });
}
function agregar() {
    var ides=$('#cursoide').text();
    $('#curso2').attr('value',ides);
}
function alumnos() {
    var route = "/alumnos/generardos";
    $("#datos").empty();
    $.getJSON(route, function(res){
        //console.log(res);
        $(res).each(function(key,value){
            $('#alumno,#alumno2').append("<option value='"+value.id+"'>"+value.alumno_nombre+"</option>");
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
        title: "<h1>Desea Eliminar Inscripcion?</h1>",
        content: "Esta opción es irreversible",
        actions: [
            {
                title: "Borrar",
                onclick: function(el){
                    var token="{{ csrf_token()}}";
                    $.ajax({
                        url: "/inscripciones/"+id+"/borrar",
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'GET',
                        dataType: 'json',
                        success: function(){
                            $(el).data('dialog').close();
                            location.href='/inscripciones';
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