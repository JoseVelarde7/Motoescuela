$(document).ready(function(){
    $('#menu_lista').attr('class','active');
});

function confirmar(id) {
    metroDialog.create({
        title: "<h1>Desea Anular Factura?</h1>",
        content: "Esta opción es irreversible",
        actions: [
            {
                title: "Anular",
                onclick: function(el){
                    var token="{{ csrf_token()}}";
                    $.ajax({
                        url: "/facturas/"+id+"/borrar",
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'GET',
                        dataType: 'json',
                        success: function(){
                            $(el).data('dialog').close();
                            location.href='/facturas';
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



