$('#menu_pago').attr('class','active');
$('.oculto').hide();
function ventana1() {
    /*metroDialog.create({
        title: "<h1 align='center'>Crear Factura</h1>",
        content: "",
        actions: [
            {
                title: "Borrar",
                onclick: function(el){
                    var token="{{ csrf_token()}}";
                    $.ajax({
                        url: "/instructores/"+id+"/borrar",
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'GET',
                        dataType: 'json',
                        success: function(){
                            $(el).data('dialog').close();
                            location.href='/instructores';
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
            overlay:true,
            background:'info',
            width:600,
            height:400,
            href:'html/juan.php'
        }
    });*/
}