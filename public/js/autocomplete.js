function autocompletar(tabla){
    $.ajax({
        type: 'POST',
        url: 'http://localhost:8000/autocompletar/'+tabla,
        data: {_token:$('input[name=_token]').val()},
        success: function(data) {
            console.log(data);
            $(document).ready(function(){
                $('input.autocomplete').autocomplete({
                    data: data,
                });
            });                                                  
        },
    });
}

