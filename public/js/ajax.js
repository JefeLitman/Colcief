function modalConstruct(titulo, mensaje, botones){
    modal = ''+
    '<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">'+
        '<div class="modal-dialog modal-dialog-centered" role="document">'+
            '<div class="modal-content">'+
                '<div class="modal-header">'+
                    '<h5 class="modal-title" id="exampleModalLongTitle">'+titulo+'</h5>'+
                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>'+
                '<div class="modal-body">'+
                    mensaje+
                '</div>';
    if(botones == true){
        modal += ''+
        '<div class="modal-footer">'+
            '<button type="button" class="btn btn-danger" id="modal-btn-si">Si</button>'+
            '<button type="button" class="btn btn-default" id="modal-btn-no">No</button>'+
        '</div>';
    }
    modal +=''+
            '</div>'+
        '</div>'+
    '</div>';
    return modal;
}
function newModal(titulo,mensaje,botones){
    $('#br').after(modalConstruct(titulo,mensaje,botones));
    $('#exampleModalCenter').modal('show');
}
function modalConfirm (callback, titulo, mensaje, botones){
    newModal(titulo, mensaje, botones);
    $("#modal-btn-si").on("click", function(){
        callback(true);
        $("#exampleModalCenter").modal('hide');
    });
    $("#modal-btn-no").on("click", function(){
        callback(false);
        $("#exampleModalCenter").modal('hide');
        
    });
}
function deleteRegistro(ruta, id, padre){
    $.ajax({
        type: 'POST',
        url: '/'+ruta+'/'+id,
        data: {_token:$('#csrf_token').attr('content'), _method:'DELETE'},
        success: function(data) {
            padre.fadeOut();
            newModal('Acción satisfactoria',data.mensaje, false);
        },
        error: function(){
            newModal('Error','La accion no pudo llevarse a cabo', false);
        }
    });
}

var cargarNotificaciones = function(){
    var noti = $('#notificaciones');
    $.ajax({
        type: 'POST',
        url: '/notificaciones',
        data: {_token:$('#csrf_token').attr('content'), _method:'POST'},
        success: function(data) {
            noti.html(data.cant)
            mensaje='';
            console.log(data.data);
            $.each( data.data, function(key, notificar) {
                mensaje+= '<tr><td class="notifica p-0"><a class="d-block w-100 p-2" href="'+notificar.link
                +'"><span class="text-info">'+notificar.titulo+': </span><br>'+notificar.descripcion+'</a>'
                +'</td><td class="align-middle p-0" style="cursor:pointer"><span  pk="'+notificar.pk_notificacion+'" class="cerrar p-2">x</span></td><tr>';
            });
            document.getElementById('noo').innerHTML=mensaje;
            // $('#notificationsBody').innerHtml = mensaje;
            // $('#shownoti').attr("data-content",mensaje);
            if(data.cant==0){
                document.getElementById('noo').innerHTML= '<div class="text-center notifica mt-2"><span> No hay notificaciones </span></div>';
            }
            console.log(data.cant)
        },
        error: function(){
            // newModal('Error','La accion no pudo llevarse a cabo', true);
        }
    });
}

$(document).ready(function(){
    $.ajaxSetup({'cache':false});
    cargarNotificaciones();
    setInterval(cargarNotificaciones, 8000);
    $('.delete').click(function(){
        var ruta = $(this).attr('ruta');
        var padre = $(this).attr('padre');
        var padre = $('#'+padre);
        var id = $(this).attr('identificador');
        modalConfirm(function(confirm){
            $("#exampleModalCenter").modal('hide');
            if(confirm){
                deleteRegistro(ruta, id, padre)
            }
        },'Confirmar','¿Desea Eliminar el registro?',true);
    });    
    
});

// function myFunction(){
//     var input, filter, table, tr, td, i;
//     input = document.getElementById("myInput");
//     filter = input.value.toUpperCase();
//     table = document.getElementById("myTable");
//     tr = table.getElementsByTagName("tr");
//     for (i = 0; i < tr.length; i++){
//         for (j = 0; j < 4; j++){
//             td = tr[i].getElementsByTagName("td")[j];
//             if(td){
//                 if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
//                     tr[i].style.display = "";
//                 } else {
//                     tr[i].style.display = "none";
//                 }
//             }
//         }       
//     }
// }


