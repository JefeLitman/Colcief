

function updateAjax(pk,link,parametro){
    // Aqui dibujariamos el preload
    document.getElementById('avisos').innerHTML="Guardando...";
    // Guardando
    return new Promise(function(resolver,rechazar){
        $.ajax({
            type: 'POST',
            url: '/'+link+'/'+pk,
            data: parametro,
            success: function(data) {
                $('#avisos').text(data.mensaje);
                resolver();
            },
            error: function(data){
                // newModal('Error','La accion no pudo llevarse a cabo', false);
                // console.log('Error: La accion no pudo llevarse a cabo.'+data);
                $('#avisos').text('Error: No es posible guardar, verifique que:');
                rechazar();
            }
        });
    });
}

function updateInasistencias(e) {
    bandera=updateAjax($(e).attr('pk'),"notasperiodo",{_token:$('#csrf_token').attr('content'), _method:'PUT',"inasistencias":$(e).html()});
    bandera.then(function () {
        console.log("Inasistencia guardada con exito.");
    },function() {
        console.log("Error");
    });
}
function updateNotasE(e) {
    bandera=updateAjax($(e).attr('pk'),"notasestudiante",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota":$(e).html()});
    bandera.then(function() {
        fk=$(e).attr('fk');
        total=0;   $( "[fk="+fk+"]").each(function(){
            if (!isNaN(parseFloat($(this).html()))){
                total += (parseFloat($(this).html())*(parseFloat($(this).attr('p'))/100));    
            }
        });
        $("#"+fk).text(total.toFixed(1));
        updateNotasDiv($("#"+fk));
    },function() {
        console.log("error");
    });
    
}
function updateNotasDiv(e) {
    // console.log("Hola"+);
    bandera=updateAjax($(e).attr('pk'),"notasdivision",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota_division":parseFloat(e.html())});	
    bandera.then(function() {
        fk=$(e).attr('fk');
        total=0;
        $( "[fk="+fk+"]").each(function(){
            if (!isNaN(parseFloat($(this).html()))){
                total += (parseFloat($(this).html())*(parseFloat($(this).attr('p'))/100));    
            }
        });
        $("#"+fk).text(total.toFixed(1));
        updateNotasPer($("#"+fk));
    },function() {
        console.log("error");
    });
        

    
    // console.log(total);
}
function updateNotasPer(e) {
    bandera=updateAjax($(e).attr('pk'),"notasperiodo",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota_periodo":e.html()});
    bandera.then(function() {
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
    },function() {
        console.log("error");
    });
    
} 
function updateNotasDef(e) {
    updateAjax($(e).attr('pk'),"materiasboletin",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota_materia":e.html()});
}

var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');

$('.table-add').click(function () {
var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
$TABLE.find('table').append($clone);
});

$('.table-remove').click(function () {
$(this).parents('tr').detach();
});

$('.table-up').click(function () {
var $row = $(this).parents('tr');
if ($row.index() === 1) return; // Don't go above the header
$row.prev().before($row.get(0));
});

$('.table-down').click(function () {
var $row = $(this).parents('tr');
$row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.click(function () {
var $rows = $TABLE.find('tr:not(:hidden)');
var headers = [];
var data = [];

// Get the headers (add special header logic here)
$($rows.shift()).find('th:not(:empty)').each(function () {
headers.push($(this).text().toLowerCase());
});

// Turn all existing rows into a loopable array
$rows.each(function () {
var $td = $(this).find('td');
var h = {};

// Use the headers from earlier to name our hash keys
headers.forEach(function (header, i) {
h[header] = $td.eq(i).text();
});

data.push(h);
});

// Output the result
$EXPORT.text(JSON.stringify(data));
});
