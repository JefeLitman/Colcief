

function updateAjax(pk,link,parametro){
    // Aqui dibujariamos el preload
    document.getElementById('avisos').innerHTML="Guardando...";
    // Guardando
    $.ajax({
        type: 'POST',
        url: '/'+link+'/'+pk,
        data: parametro,
        success: function(data) {
            $('#avisos').text(data.mensaje);
        },
        error: function(data){
            // newModal('Error','La accion no pudo llevarse a cabo', false);
            // console.log('Error: La accion no pudo llevarse a cabo.'+data);
            $('#avisos').text('Error: La accion no pudo llevarse a cabo.'+data);
            
        }
    });
}

function updateInasistencias(e) {
    updateAjax($(e).attr('pk'),"notasperiodo",{_token:$('#csrf_token').attr('content'), _method:'PUT',"inasistencias":e.value});
}
function updateNotasE(e) {
    updateAjax($(e).attr('pk'),"notasestudiante",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota":e.value});	
    fk=$(e).attr('fk');
    total=0;   $( "[fk="+fk+"]").each(function(){
        if (!isNaN(parseFloat($(this).val()))){
            total += (parseFloat($(this).val())*(parseFloat($(this).attr('p'))/100));    
        }
    });
    $("#"+fk).text(total.toFixed(1));
    updateNotasDiv($("#"+fk));
    // console.log(total);
    // total=total/parseFloat(notas.toArray().length);
}
function updateNotasDiv(e) {
    // console.log("Hola"+);
    updateAjax($(e).attr('pk'),"notasdivision",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota_division":parseFloat(e.html())});	
    fk=$(e).attr('fk');
    total=0;
    $( "[fk="+fk+"]").each(function(){
        if (!isNaN(parseFloat($(this).html()))){
            total += (parseFloat($(this).html())*(parseFloat($(this).attr('p'))/100));    
        }
    });
    $("#"+fk).text(total.toFixed(1));
    updateNotasPer($("#"+fk));
    // console.log(total);
}
function updateNotasPer(e) {
    updateAjax($(e).attr('pk'),"notasperiodo",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota_periodo":e.html()});
    fk=$(e).attr('fk');
    total=0;
    periodos=$( "[fk="+fk+"]");
    periodos.each(function(){
        if (!isNaN(parseFloat($(this).html()))){
            total += parseFloat($(this).html());    
        }
    });
    total=total/parseFloat(periodos.toArray().length);
    $("#"+fk).text(total.toFixed(1));
    updateNotasDef($("#"+fk));
    
} 
function updateNotasDef(e) {
    updateAjax($(e).attr('pk'),"materiasboletin",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota_materia":e.html()});
}

