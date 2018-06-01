$(document).ready(function(){

    var route = "/inicio/generar";
    $.getJSON(route, function(res){
        $('#cusuarios').html(res[1]);
        $('#calumnos').html(res[2]);
        var i=1;
        $(res[0]).each(function(key,value){
            //$('#usuario,#usuario2').append("<option value='"+value.id+"'>"+value.user_nombre+"</option>");
            $('#contenedor'+i).show();
            $('#contenedor'+i).attr('href','cursos/'+value.id);
            $('#curso'+i).html(value.curso_nombre);
            i++;
        });
    });

});