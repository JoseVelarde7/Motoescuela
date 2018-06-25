$(document).ready(function(){

    var route = "/inicio/generar";
    $.getJSON(route, function(res){
        $('#cusuarios').html(res[0]);
        $('#calumnos').html(res[1]);
        $('#cmotos').html(res[2]);
        var i=1;
        $(res[3]).each(function(key,value){
            //$('#usuario,#usuario2').append("<option value='"+value.id+"'>"+value.user_nombre+"</option>");
            $('#contenedor'+i).show();
            $('#curso'+i).html(value.alumno_nombre);
            i++;
        });
    });

});