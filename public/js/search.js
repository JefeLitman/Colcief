ant=1;
$(document).ready(function(){
     $('#entradafilter').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.contenidobusqueda tr').hide();
        $('.contenidobusqueda tr').filter(function () {
            return rex.test($(this).text());
        }).show();

        })
        var i;

        $('body').on('click', '.page-item', function(){
            $(this).addClass( "active" );
            $("#"+ant).removeClass( "active" );
            ant=$(this).attr('id');
            var nid=parseInt($(this).attr('id'))*2;
            $( "tr" ).hide();
            $( "tr" ).eq(0).show();
            for (i = nid-1; i < nid+1; i++) { 
                $( "tr" ).eq(i).show();
            }
          })

        // $( "tr" ).hide();
        // $( "tr" ).eq(0).show();
        // for (i = 1; i < 3; i++) { 
        //     $( "tr" ).eq(i).show();
        // }
        
        // var nFilas = $("#myTable tr").length;
        // $('#registros').html(nFilas+" registros");
        // var bot= Math.ceil(nFilas/10);
        // // var npages="<li class='page-item disabled'><a class='page-link' href='#' tabindex='-1'>Ant</a></li>";
        // var npages="";
        // for (i = 0; i < bot; i++) { 
        //     if (i==0){
        //         npages += "<li class='page-item active' id='"+(i+1)+"'><a class='page-link'  href='#'>"+(i+1)+"</a></li>";
        //     }else{
        //         npages += "<li class='page-item' id='"+(i+1)+"'><a class='page-link' href='#'>"+(i+1)+"</a></li>";
        //     }
        // }
        // // npages+= "<li class='page-item disabled'><a class='page-link' href='#'>Sig</a></li>";
        // $('#paginator').html(npages);
        
});