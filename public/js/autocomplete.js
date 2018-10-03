function autocompletar(tabla, datos){
    $.ajax({
        type: 'POST',
        url: 'http://localhost:8000/autocompletar/'+tabla,
        data: {_token:$('input[name=_token]').val(), datos:datos},
        success: function(data) {
            console.log(data);
            $(document).ready(function(){
                $('input.autocomplete').autocomplete({
                    data: data,
                });
            });                                                  
        },
        error: function(){

        }
    });
}

