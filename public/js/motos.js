$('#menu_moto').attr('class','active');
$('.oculto').hide();

function confirmar(id) {
    metroDialog.create({
        title: "<h1>Desea Borrar Motocicleta?</h1>",
        content: "Esta opción es irreversible",
        actions: [
            {
                title: "Borrar",
                onclick: function(el){
                    var token="{{ csrf_token()}}";
                    $.ajax({
                        url: "/motos/"+id+"/borrar",
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'GET',
                        dataType: 'json',
                        success: function(){
                            $(el).data('dialog').close();
                            location.href='/motos';
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