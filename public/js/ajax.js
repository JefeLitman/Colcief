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
function deleteRegistro(ruta, id, padre, direccion=null){
    $.ajax({
        type: 'POST',
        url: '/'+ruta+'/'+id,
        data: {_token:$('#csrf_token').attr('content'), _method:'DELETE',direccion:direccion},
        success: function(data) {
            if(data.url){
                location.href=data.url
            } else {
                padre.fadeOut();
                newModal('Acción satisfactoria', data.mensaje, false);
            }
        },
        error: function(){
            newModal('Error','La accion no pudo llevarse a cabo', false);
        }
    });
}

function restaurar(ruta, id, direccion){
    $.ajax({
        type: 'POST',
        url: '/'+ruta+'/restaurar/'+id,
        data: {_token:$('#csrf_token').attr('content'), direccion:direccion},
        success: function(data) {
            location.href=data.url
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
            if(data.cant > 0){
                noti.css('display', 'inline-block');
                noti.html(data.cant)
                mensaje='<table id="noo" class="">';
                $.each( data.data, function(key, notificar) {
                    mensaje+= '<tr class="n'+notificar.pk_notificacion+'"><td class="notifica p-0"><a class="d-block w-100 p-2" href="'+notificar.link
                    +'"><span class="text-info">'+notificar.titulo+': </span><br>'+notificar.descripcion+'</a>'
                    +'</td><td class="align-middle p-0" style="cursor:pointer"><span onclick="eliminarNotificacion(this)" id="n'+notificar.pk_notificacion+'" pk="'
                    +notificar.pk_notificacion+'" class="cerrar p-2">x</span></td><tr>';
                });
                mensaje+='</table>';
                $('#noo').attr('data-content', mensaje);
            }else if(data.cant==0){
                noti.fadeOut()
                $('#noo').attr('data-content', '<div class="text-center notifica mt-2"><span> No hay notificaciones </span></div>');
            }
            
        }
    });
}

var eliminarNotificacion = function(e){
    var noti = $('#notificaciones');
    var id = $(e).attr('pk');
    var idc = $(e).attr('id');
    var n = document.getElementsByClassName(idc);
    $.ajax({
        type: 'POST',
        url: '/notificaciones/'+id,
        data: {_token:$('#csrf_token').attr('content'), _method:'DELETE'},
        success: function(data) {
            cant = noti.html()-1;
            if( cant > 0){
                noti.html(cant);
                n[0].remove();
            }else if(cant == 0){
                noti.fadeOut()
                n[0].remove();
                $('.popover').toggleClass('show');
                $('#noo').attr('data-content', '<div class="text-center notifica mt-2"><span> No hay notificaciones </span></div>');
            }
        }
    }); 
}

$(document).ready(function(){
    $.ajaxSetup({'cache':false});
    cargarNotificaciones();
    setInterval(cargarNotificaciones, 5000);
    $('.delete').click(function(){
        var ruta = $(this).attr('ruta');
        var padre = $(this).attr('padre');
        var padre = $('#'+padre);
        var id = $(this).attr('identificador');
        var direccion = $(this).attr('direccion');
        modalConfirm(function(confirm){
            $("#exampleModalCenter").modal('hide');
            if(confirm){
                deleteRegistro(ruta, id, padre, direccion)
            }
        },'Confirmar','¿Desea Eliminar el registro?',true);
    });    
    $('.restore').click(function(){
        var ruta = $(this).attr('ruta');
        var id = $(this).attr('identificador');
        var direccion = $(this).attr('direccion');
        modalConfirm(function(confirm){
            $("#exampleModalCenter").modal('hide');
            if(confirm){
                restaurar(ruta, id, direccion)
            }
        },'Confirmar','¿Desea restaurar el registro?',true);
    });
});