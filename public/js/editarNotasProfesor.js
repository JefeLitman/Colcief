
$('#myModal').modal('hide')

var errores=[];

// onkeyup="updateNotasE(this);"

function updateAjax(pk,link,parametro){
    // Aqui dibujariamos el preload
    $('#avisos').attr('class','alert alert-primary');
    $('#avisos').text('Guardando...');
    // Guardando
    return new Promise(function(resolver,rechazar){
        $.ajax({
            type: 'POST',
            url: '/'+link+'/'+pk,
            data: parametro,
            success: function(data) {
                resolver();
            },
            error: function(data){
                $('#avisos').attr('class','');
                $('#avisos').text('');
                $('#avisoError').css('display','block');
                rechazar();
                
            }
        });
        
        
    });
}

function desempeno(nota,recuperacion=null) {
    //Favor no cambiar el 0 By:Paola 
    r="";
    if (recuperacion != null) {
        r=" Recuperada en: "+recuperacion;
    }
    if (nota >= 0 && nota <= 2.9){
        clase="table-danger";
        titulo="Nota Baja"+r;
    }else if(nota >= 3 && nota <= 3.9){
        clase="table-warning";  
        titulo="Nota Basica"+r;
    }else if(nota >= 4 && nota <= 4.5){
        clase="table-primary";  
        titulo="Nota Alta"+r;
    }else if(nota >= 4.6 && nota <= 5.0){
        clase="table-success"; 
        titulo="Nota Superior"+r;
    }
    return [clase,titulo];
}

function updateInasistencias(e) {
    bandera=updateAjax($(e).attr('pk'),"notasperiodo",{_token:$('#csrf_token').attr('content'), _method:'PUT',"inasistencias":$(e).html()});
    bandera.then(function () {
        $(e).attr('class','');
        if (errores.includes($(e).attr('id'))) {
            errores.splice(errores.indexOf($(e).attr('id')),1);
        }
        $('#avisos').attr('class','alert alert-success');
        if (errores.length==0) {
            $('#avisoError').css('display','none');
            $('#avisos').text('Todo los cambios han sido guardados con exito.');  
        } else {
            $('#avisos').text('Nota guardada con exito.');   
        }
        console.log("Inasistencia guardada con exito.");
        console.log(('Array errores:'+errores));
    },function() {
        if (!errores.includes($(e).attr('id'))) {
            errores.push($(e).attr('id'));
            $(e).attr('class','border border-danger');
        }
        console.log("Error de guardado, inasistencia.");
        console.log(('Array errores:'+errores));
    });
    

}

function updateNotasE(e) {
    var nota = parseFloat($(e).html());
    var notaAceptada =parseFloat($(e).attr('notaAceptada'));
    if (nota != notaAceptada) {
        bandera=updateAjax($(e).attr('pk'),"notasestudiante",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota":nota});
        bandera.then(function() {
            if (nota>=1 && nota<=5) {
                $(e).attr('notaAceptada',nota);  
                fk=$(e).attr('fk');
                total=0; 
                $( "[fk="+fk+"]").each(function(){
                    if (!isNaN(parseFloat($(this).attr('notaAceptada')))){
                        total += (parseFloat($(this).attr('notaAceptada'))*(parseFloat($(this).attr('p'))/100));    
                    }
                });
                total=total.toFixed(1);
                div=$("#"+fk);
                div.text(total);
                [clase,titulo]=desempeno(total);
                div.attr({'class':clase,'data-original-title':titulo});
                updateNotasDiv($("#"+fk));
                $(e).attr('class','');
                if (errores.includes($(e).attr('id'))) {
                    errores.splice(errores.indexOf($(e).attr('id')),1);
                }
                console.log("NotaE guardad con exito."); 
            }else{console.log("Cambio abrupto de la nota.")}
            console.log(('Array errores:'+errores));
        },function() {
            if (!errores.includes($(e).attr('id'))) {
                errores.push($(e).attr('id'));
                $(e).attr('class','border border-danger');
            }
            console.log("Error de guardado, nota estudiante.");
            console.log(('Array errores:'+errores));
        });
    }else{
        console.log("El valor de la nota no ha cambiado.");
    }
    
}
function updateNotasDiv(e) {
    // console.log("Hola"+);
    bandera=updateAjax($(e).attr('pk'),"notasdivision",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota_division":parseFloat(e.html())});	
    bandera.then(function() {
        fk=$(e).attr('fk');
        total=0.0;
        $( "[fk="+fk+"]").each(function(){
            if (!isNaN(parseFloat($(this).html()))){
                total += (parseFloat($(this).html())*(parseFloat($(this).attr('p'))/100));    
            }
        });
        total=Math.round(total*10)/10;
        per=$("#"+fk);
        per.text(total);
        [clase,titulo]=desempeno(total,per.attr('recuperacion'));
        per.attr({'class':clase,'data-original-title':titulo});
        updateNotasPer($("#"+fk));
        console.log("NotaDiv guardada con exito.");
        console.log(('Array errores:'+errores));
    },function() {
        console.log("Error de guardado, division.");
        console.log(('Array errores:'+errores));
    });
}

function updateNotasPer(e) {
    bandera=updateAjax($(e).attr('pk'),"notasperiodo",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota_periodo":e.html()});
    bandera.then(function() {
        total=0.0;
        fk=$(e).attr('fk');
        periodos=$( "[fk="+fk+"]");
        periodos.each(function(){
            if( parseFloat($(this).attr('recuperacion'))<=3.0 &&  parseFloat($(this).attr('recuperacion'))>parseFloat($(this).html())){
                total += parseFloat($(this).attr('recuperacion'));
                console.log("Recuperacion");
            }else{
                if (!isNaN(parseFloat($(this).html()))){
                    total += parseFloat($(this).html());    
                }
            }
            
        });
        total=total/parseFloat(periodos.toArray().length);
        total=Math.round(total*10)/10;
        def=$("#"+fk);
        def.text(total);
        [clase,titulo]=desempeno(total);
        def.attr({'class':clase,'data-original-title':titulo});
        updateNotasDef($("#"+fk));
        console.log("NotaPer guardada con exito");
        console.log(('Array errores:'+errores));
    },function() {
        console.log("Error de guardado, periodo.");
        console.log(('Array errores:'+errores));
    });
    
} 

function updateNotasDef(e) {
    bandera=updateAjax($(e).attr('pk'),"materiasboletin",{_token:$('#csrf_token').attr('content'), _method:'PUT',"nota_materia":e.html()});
    bandera.then(function () {
        $('#avisos').attr('class','alert alert-success');
        if (errores.length==0) {
            $('#avisoError').css('display','none');
            $('#avisos').text('Todo los cambios han sido guardados con exito.');  
        } else {
            $('#avisos').text('Nota guardada con exito.');   
        }
        console.log("NotaDef guardad con exito.");
        console.log(('Array errores:'+errores));
    },function () {
        console.log("Error de guardado, definitiva.");
        console.log(('Array errores:'+errores));
    });

}

var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');

$('.table-add').click(function () {
var $clone = $TABLE.find('tr.hide').clone(true).removeclase('hide table-line');
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
