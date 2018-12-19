

function updateAjax(e){
    // Aqui dibujariamos el preload
    document.getElementById('avisos').innerHTML="Guardando...";
    // Guardando
    $.ajax({
        type: 'POST',
        url: '/notasperiodo/'+$(e).attr('pk'),
        data: {_token:$('#csrf_token').attr('content'), _method:'PUT',$(e).attr('name'):e.value},
        success: function(data) {
            document.getElementById('avisos').innerHTML=data.mensaje;
        },
        error: function(data){
            // newModal('Error','La accion no pudo llevarse a cabo', false);
            document.getElementById('avisos').innerHTML='Error: La accion no pudo llevarse a cabo.'+data;
            
        }
    });
}
function updateInasistencias(e) {
    updateAjax(e);
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


