// function modalConstruct(titulo, mensaje, botones){
//     modal = ''+
//     '<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">'+
//         '<div class="modal-dialog modal-dialog-centered" role="document">'+
//             '<div class="modal-content">'+
//                 '<div class="modal-header">'+
//                     '<h5 class="modal-title" id="exampleModalLongTitle">'+titulo+'</h5>'+
//                     '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
//                         '<span aria-hidden="true">&times;</span>'+
//                     '</button>'+
//                 '</div>'+
//                 '<div class="modal-body">'+
//                     mensaje+
//                 '</div>';
//     if(botones == true){
//         modal += ''+
//         '<div class="modal-footer">'+
//             '<button type="button" class="btn btn-danger" id="modal-btn-si">Si</button>'+
//             '<button type="button" class="btn btn-default" id="modal-btn-no">No</button>'+
//         '</div>';
//     }
//     modal +=''+
//             '</div>'+
//         '</div>'+
//     '</div>';
//     return modal;
// }
// function newModal(titulo,mensaje,botones){
//     $('#br').after(modalConstruct(titulo,mensaje,botones));
//     $('#exampleModalCenter').modal('show');
// }
// function modalConfirm (callback, titulo, mensaje, botones){
//     newModal(titulo, mensaje, botones);
//     $("#modal-btn-si").on("click", function(){
//         callback(true);
//         $("#exampleModalCenter").modal('hide');
//     });
//     $("#modal-btn-no").on("click", function(){
//         callback(false);
//         $("#exampleModalCenter").modal('hide');
        
//     });
// }
// function deleteRegistro(ruta, id, padre){
//     $.ajax({
//         type: 'POST',
//         url: '/'+ruta+'/'+id,
//         data: {_token:$('#csrf_token').attr('content'), _method:'DELETE'},
//         success: function(data) {
//             padre.fadeOut();
//             newModal('Acción satisfactoria',data.mensaje, false);
//         },
//         error: function(){
//             newModal('Error','La accion no pudo llevarse a cabo', false);
//         }
//     });
// }
function updateInasistencias(e) {
    $.ajax({
        type: 'POST',
        url: '/notasperiodo/'+$(e).attr('pk'),
        data: {_token:$('#csrf_token').attr('content'), _method:'PUT','inasistencias':e.value},
        success: function(data) {
            newModal('Acción satisfactoria',data.mensaje, false);
        },
        error: function(){
            newModal('Error','La accion no pudo llevarse a cabo', false);
        }
    });
}
function updateNotasE(e) {
    alert('hola estudiante');
}
function updateNotasDiv(e) {
    alert('hola division');
}
function updateNotasPer(e) {
    alert('Hola periodo');
} 
function updateNotasDef(e) {
    alert('Hola Definitiva');
} 
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


