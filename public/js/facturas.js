var numero=1;
$(document).ready(function(){

    $('#menu_factura').attr('class','active');
    $('.oculto').hide();
    alumnos();
    $('#alumno').select2();

    $('#crear').on('click',function(e){
        e.preventDefault();
        var datos=$('#formulario').serialize();
        var token="{{ csrf_token()}}";
        $.ajax({
            url: "/facturas/registrar",
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            data:datos,
            dataType: 'json',
            success: function(res){
                console.log(res);
                /*alert(res.mensaje)*/
                location.href='/facturas/mostrar/'+res;
            }
        });
    });
});

function alumnos() {
    var route = "/alumnos/generar";
    $("#datos").empty();
    $.getJSON(route, function(res){
        $(res).each(function(key,value){
            $('#alumno').append("<option value='"+value.id+"'>"+value.alumno_nombre+"</option>");
        });
    });
}
function agregar() {
    numero=numero+1;
    $('#cuerpo').append("<tr id='fila"+numero+"'>\n" +
        "<td>\n" +
        "    <div class=\"input-control number\">\n" +
        "        <input type=\"number\" name=\"cantidad"+numero+"\" id=\"cantidad"+numero+"\" form='formulario' onkeyup=\"multi(this.name)\">\n" +
        "    </div>\n" +
        "</td>\n" +
        "<td>\n" +
        "    <div class=\"input-control text\">\n" +
        "        <input type=\"text\" name=\"concepto"+numero+"\" id=\"concepto"+numero+"\" form='formulario'>\n" +
        "    </div>\n" +
        "</td>\n" +
        "<td>\n" +
        "    <div class=\"input-control text\">\n" +
        "        <input type=\"text\" name=\"monto"+numero+"\" id=\"monto"+numero+"\" form='formulario' onkeyup=\"multi(this.name)\">\n" +
        "    </div>\n" +
        "</td>\n" +
        "    <td id=\"subtotal"+numero+"\"></td>\n" +
        "</tr>");
}
function quitar() {
    $('#fila'+numero).remove();
    numero=numero-1;
}

function multi(nombre) {
    var cantidad=nombre.charAt(nombre.length-1);
    var ca=$('#cantidad'+cantidad).val();
    var mo=$('#monto'+cantidad).val();
    var multi=parseFloat(ca)*parseFloat(mo);
    $('#subtotal'+cantidad).html(multi);
    $('#total').attr('value',multi);
}

