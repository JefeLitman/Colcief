function autocompletar(tabla, datos){
    $.ajax({
        type: 'POST',
        url: '/autocompletar/'+tabla,
        data: {_token:$('input[name=_token]').val(), datos:datos},
        success: function(data) {
            $(document).ready(function(){
                $('input.autocomplete').autocomplete({
                    data: data,
                });
            });
        },
        error: function(){
            alert('Algo salio mal :C')
        }
    });
}

$(document).ready(function(){
    $('.delete').click(function(){
        var row = $(this).parents('tr');
        var tabla = $(this).attr('tabla');
        var id = $(this).attr('identificador');
        var newModal = function (titulo, mensaje, botones){
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

        var montar = function(titulo,mensaje,botones){
            $('#br').after(newModal(titulo,mensaje,botones));
            $('#exampleModalCenter').modal('show');
        }

        var modalConfirm = function(callback, titulo, mensaje, botones){
            montar('Confirmar','¿Desea eliminar el registro?',botones);
            $("#modal-btn-si").on("click", function(){
                callback(true);
                $("#exampleModalCenter").modal('hide');
            });
            $("#modal-btn-no").on("click", function(){
                callback(false);
                $("#exampleModalCenter").modal('hide');
            });
        };

        modalConfirm(function(confirm){
            if(confirm){
                $.ajax({
                    type: 'POST',
                    url: '/'+tabla+'s/'+id,
                    data: {_token:$('input[name=_token]').val(), _method:'DELETE'},
                    success: function(data) {
                        row.fadeOut();
                        montar('Acción satisfactoria',data.mensaje, false);
                    },
                    error: function(){
                        montar('Error','La accion no pudo llevarse a cabo', false);
                    }
                });
            }
        },'Confirmar','¿Desea Eliminar el registro?',true);
    });
});


