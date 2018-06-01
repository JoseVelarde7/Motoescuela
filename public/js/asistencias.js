$(document).ready(function(){

    $('#menu_asistencia').attr('class','active');
    $('.oculto').hide();
    $('#user').select2();
    usuarios();

    $('#entrada').on('click',function(e){
        e.preventDefault();
        var pa=$('#pass').val();
        var us=$('#user').val();
        if(pa==''){
            metroDialog.create({
                title: "<h1>Error</h1>",
                content: "Debe llenar el campo contraseña",
                actions: [
                    {
                        title: "Cancelar",
                        cls: "js-dialog-close"
                    }
                ],
                options: {
                    width:'500',
                    height:'250',
                    background:'warning'
                }
            });
        }else{
            validar(pa,us);
        }
    });

    $('#salida').on('click',function(e){
        e.preventDefault();
        var pa=$('#pass').val();
        var us=$('#user').val();
        if(pa==''){
            metroDialog.create({
                title: "<h1>Error</h1>",
                content: "Debe llenar el campo contraseña",
                actions: [
                    {
                        title: "Cancelar",
                        cls: "js-dialog-close"
                    }
                ],
                options: {
                    width:'500',
                    height:'250',
                    background:'warning'
                }
            });
        }else{
            validar2(pa,us);
        }
    });

});

function usuarios() {
    var route = "/usuarios/generar";
    $("#datos").empty();
    $.getJSON(route, function(res){
        $(res).each(function(key,value){
            $('#user').append("<option value='"+value.id+"'>"+value.user_nombre+"</option>");
        });
    });
}
function validar(pa,us) {
    var route = "/usuarios/entrada/"+us+"/"+pa;
    $("#datos").empty();
    var d = new Date();
    $.getJSON(route, function(res){
        if(res.length==0){
            metroDialog.create({
                title: "<h1>Error</h1>",
                content: "Verifique su contraseña",
                actions: [
                    {
                        title: "Cancelar",
                        cls: "js-dialog-close"
                    }
                ],
                options: {
                    width:'500',
                    height:'250',
                    background:'warning'
                }
            });
        }else{
            metroDialog.create({
                title: "<h1>Registrado</h1>",
                content: "<h2>Hora de Entrada: "+d.getHours()+":"+d.getMinutes()+"</h2>",
                actions: [
                    {
                        title: "Aceptar",
                        onclick: function(el){
                            var fo=$('#formulario1').serialize();
                            var token="{{ csrf_token()}}";
                            $.ajax({
                                url: "/asistencias/crear",
                                headers: {'X-CSRF-TOKEN': token},
                                type: 'POST',
                                data:fo,
                                dataType: 'json',
                                success: function(res){
                                    location.href='/asistencias/marcar';
                                }
                            });
                        }
                    }
                ],
                options: {
                    width:'500',
                    height:'250',
                    background:'info'
                }
            });
        }
    });
}

function validar2(pa,us) {
    var route = "/usuarios/salida/"+us+"/"+pa;
    $("#datos").empty();
    var d = new Date();
    $.getJSON(route, function(res){
        if(res=='entrada'){
            metroDialog.create({
                title: "<h1>Error</h1>",
                content: "Debe Registrar primero la entrada",
                actions: [
                    {
                        title: "Cancelar",
                        cls: "js-dialog-close"
                    }
                ],
                options: {
                    width:'500',
                    background:'warning'
                }
            });
        }else if(res=='vacio'){
            metroDialog.create({
                title: "<h1>Error</h1>",
                content: "Verifique su contraseña",
                actions: [
                    {
                        title: "Cancelar",
                        cls: "js-dialog-close"
                    }
                ],
                options: {
                    width:'500',
                    background:'warning'
                }
            });
        }else{
            metroDialog.create({
                title: "<h1>Registrado</h1>",
                content: "<h2>Hora de Salida: "+d.getHours()+":"+d.getMinutes()+"</h2>",
                actions: [
                    {
                        title: "Aceptar",
                        onclick: function(el){
                            var fo=$('#formulario1').serialize();
                            var token="{{ csrf_token()}}";
                            $.ajax({
                                url: "/asistencias/modificar/"+res,
                                headers: {'X-CSRF-TOKEN': token},
                                type: 'POST',
                                data:fo,
                                dataType: 'json',
                                success: function(res){
                                    location.href='/asistencias/marcar';
                                }
                            });
                        }
                    }
                ],
                options: {
                    width:'500',
                    height:'250',
                    background:'info'
                }
            });
        }
    });
}
