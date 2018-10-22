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
        if(!confirm('¿Esta seguro de elimnar al '+tabla+'?')){
            return false;
        }else{
            $.ajax({
                type: 'POST',
                url: '/'+tabla+'s/'+id,
                data: {_token:$('input[name=_token]').val(), _method:'DELETE'},
                success: function(data) {
                    row.fadeOut();
                    alert(data.mensaje)                                          
                },
                error: function(){
                    alert('Algo salio mal :C')
                }
            });
        }
    })
});
    

