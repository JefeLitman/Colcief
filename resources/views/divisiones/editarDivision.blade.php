@extends('contenedores.admin')
@section('titulo','Editar División')
@section('contenedor_admin')
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="card-title text-center">
                Editar componentes
            </h3>
            <br>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Información</strong><br>
                La suma total del procentaje de cada componente debe ser igual a 100%.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editar" enctype="multipart/form-data" action="{{route('divisiones.update')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="table-responsive">
                    <table class="table table-striped table-condensed table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center" style="color:#00695c">Nombre</th>
                                <th scope="col" class="text-center" style="color:#00695c">Descripción</th>
                                <th scope="col" class="text-center" style="color:#00695c"><i class="fas fa-percentage"></i></th>
                            </tr>
                        </thead>
                        <tbody id="div">
                            @for ($i = 0; $i < count($division); $i++)
                            <tr class="menos" id="index[{{$i}}]">
                                <th scope="row">
                                    <input type="text" class="form-control" id="nombre[{{$i}}]" name="nombre[{{$i}}]" value="{{$division[$i]->nombre}}">
                                </th>
                                <td>
                                    <textarea class="form-control" id="descripcion[{{$i}}]" name="descripcion[{{$i}}]">{{$division[$i]->descripcion}}</textarea>
                                </td>
                                <td>
                                    <input type="number" class="form-control"
                                    id="porcentaje[{{$i}}]" name="porcentaje[{{$i}}]" value="{{$division[$i]->porcentaje}}">
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4 mb-2 mx-auto">
                        <a class=" btn btn-info btn-block rounded-0 py-2" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important; width: 40%;" id="create"><i class="fas fa-plus" style="color: white !important;"></i></a>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4 mb-2 mx-auto">
                        <a class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #17a2b8 !important; border-color: #17a2b8 !important; width: 40%;" id="delete"><i class="fas fa-minus" style="color: white !important;"></i></a>
                    </div>
                </div>
                <div class="row justify-content-center" style="background-color: #fafafa !important;">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <button id="enviar" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #17a2b8 !important; border-color: #17a2b8 !important; width: 40%;" type="submit" name="action">
                            Crear
                        </button>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    i = {{count($division)}};
    $('#create').click(function(){
        $('#div').append(
            '<tr class="menos" id="index['+i+']">'+
               ' <th scope="row">'+
                    '<input type="text" class="form-control" id="nombre['+i+']" name="nombre['+i+']">'+
                '</th>'+
                '<td>'+
                    '<textarea class="form-control" id="descripcion['+i+']" name="descripcion['+i+']">'+'</textarea>'+
                '</td>'+
                '<td>'+
                    '<input type="number" class="form-control" id="porcentaje['+i+']" name="porcentaje['+i+']">'+
                '</td>'+
            '</tr>'
        );
        i++;
    });
    $('#delete').click(function(){
        $('form .menos:last').remove();
        i--;
    });
    function onSubmit(){}
    $('#enviar').click(function(e){
        e.preventDefault();
        modalConfirm(function(confirm){
            if(confirm){
                $('#editar').submit();
            }
        },'¿Desea actualizar las divisiones?','Este cambio afectara el valor de cada una de las notas establecidas hasta el momento',true);
    });
</script>
<br>
@endsection
