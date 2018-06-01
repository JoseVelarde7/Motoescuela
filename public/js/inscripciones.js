$(document).ready(function(){
    $('#menu_ins').attr('class','active');
    alumnos();
    cursos();
    $('#alumno').select2();
    mostrar("id");
    $('#modificarins').on('click',function(e){
        e.preventDefault();
        var fo2=$('#formulario2').serialize();
        var id2=$('#ide').val();
        var cu2=$('#cu').val();
        var token="{{ csrf_token()}}";
        $.ajax({
            url: "/inscripciones/"+id2+"/"+cu2,
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
});
function modificar(id) {
    var route = "/inscripciones/buscar/"+id;
    $.getJSON(route, function(res){
        $(res).each(function(key,value){
            $("#alumno2").val(value.alumno_id);
            $("#curso2").val(value.curso_id);
            $("#ide").attr('value',value.id);
            $("#cu").attr('value',value.curso_id);
            $("#obs2").attr('value',value.ins_obs);
        });
    });
}
function mostrar(id) {
    var route = "/cursos/generar/"+id;
    $.getJSON(route, function(res){
        $(res).each(function(key,value){
            $('#ncurso').html(value.curso_nombre);
            $('#nistructor').html(value.user_nombre);
            $('#nfoto').attr("src","/storage/"+value.user_foto);
            $('#nmoto').html(value.moto_marca);
            $('#nfoto2').attr("src","/storage/"+value.moto_foto);
            $('#hora').html(value.horario_dias+" de "+value.horario_entrada+" a "+value.horario_salida);
            $('#numero').html(value.curso_estudiantes);
            $('#cursoide').html(value.id);
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
function confirmar(id,cu) {
    metroDialog.create({
        title: "<h1>Desea Eliminar Inscripcion?</h1>",
        content: "Esta opción es irreversible",
        actions: [
            {
                title: "Borrar",
                onclick: function(el){
                    var token="{{ csrf_token()}}";
                    $.ajax({
                        url: "/inscripciones/"+id+"/borrar/"+cu,
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