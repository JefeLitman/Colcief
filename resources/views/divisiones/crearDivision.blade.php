@extends('contenedores.admin')
@section('titulo','Estudiante Nuevo')
@section('contenedor_admin')
    @include('error.error')
<br>
<div class="container">
    <h1 class="card-title text-center">
        Divisiones
    </h1>
    <br>
    <form enctype="multipart/form-data" action="/divisiones" method="POST">
    @csrf
        <div class="table-responsive">
            <script>var i=0</script>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Descripción</th>
                        <th scope="col" class="text-center"><i class="fas fa-percentage"></i></th>
                    </tr>
                </thead>
                <tbody id="div">
                    @for ($i = 0 ; $i < 1; $i++)
                    <tr  class="menos" id="index[{{$i}}]">
                        <th scope="row">
                            <input type="text" class="form-control" id="nombre[{{$i}}]" name="nombre[{{$i}}]" value="{{old('nombre(field.i)')}}">
                        </th>
                        <td>
                            <textarea  class="form-control" id="descripcion[{{$i}}]" name="descripcion[{{$i}}]">
                                {{old('descripcion(field.i)')}}
                            </textarea>
                        </td>
                        <td>
                            <input type="number" class="form-control" id="porcentaje[{{$i}}]" name="porcentaje[{{$i}}]" value="{{old('porcentaje(field.i)')}}">
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4 mb-2 mx-auto">
                <a class=" btn btn-info btn-block rounded-0 py-2" style="background-color: #039be5 !important; border-color: #039be5 !important; width: 40%;" id="create"><i class="fas fa-plus" style="color: white !important;"></i></a>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4 mb-2 mx-auto">
                <a class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #039be5 !important; border-color: #039be5 !important; width: 40%;" id="delete"><i class="fas fa-minus" style="color: white !important;"></i></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #0277bd !important; border-color: #0277bd !important; width: 40%;" type="submit" name="action">
                    Crear
                </button>
                <div class="col-md-4"></div>
            </div>
        </div>
    </form>
</div>
<script>
    $('#create').click(function(){
        i++;
        $('#div').append(
            '<tr class="menos" id="index['+i+']">'+
                '<th scope="row">'+
                    '<input type="text" class="form-control" id="nombre['+i+']" name="nombre['+i+']">'+
                '</th>'+
                '<td>'+
                    '<textarea class="form-control" id="descripcion['+i+']" name="descripcion['+i+']">'+
                    '</textarea>'+
                '</td>'+
                '<td>'+
                    '<input type="number" class="form-control" id="porcentaje['+i+']" name="porcentaje['+i+']" >'+
                '</td>'+
            '</tr>'
        );
    });

    $('#delete').click(function(){
        $('#div .menos:last').remove();
        i--;
    });
</script>
<br>
@endsection
