@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Empleados')
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-10">
            <form action="" id="autocompletar">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1" style="background-color:#00acc1;"><i class="fas fa-search" style="color:white;"></i></span>
                    </div>
                    <input type="text" class="form-control"  id="autocomplete-input" class="autocomplete" placeholder="Nombre" aria-label="lead" aria-describedby="basic-addon1">
                </div>
            </form>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-condensed table-hover text-center">
                    <thead>
                        <tr>
                            <th class="center" scope="col" style="color:#00695c">Cedula</th>
                            <th class="center" scope="col" style="color:#00695c">Nombre</th>
                            <th class="center" scope="col" style="color:#00695c">Apellido</th>
                            <th class="center" scope="col" style="color:#00695c">Correo</th>
                            <th class="center" scope="col" style="color:#00695c">Cargo</th>
                            <th class="center" scope="col" style="color:#00695c" colspan="3">Acciones</th>
                            {{-- <th>Editar</th>
                            <th>Eliminar</th> --}}
                        </tr>
                    </thead>
                    @php
                        $cargo = ['Administrador', 'Director', 'Profesor']
                    @endphp
                    <tbody>
                        @foreach ($empleado as $i)
                            <tr id="empleados{{$i->cedula}}">
                                <td class="center" scope="row">{{$i->cedula}}</td>
                                <td class="center">{{ucwords($i->nombre)}}</td>
                                <td class="center">{{ucwords($i->apellido)}}</td>
                                <td class="center">{{ucwords($i->correo)}}</td>
                                <td class="center">{{ucwords($cargo[$i->role])}}</td>
                                <td class="center">
                                    <a title="Agregar tiempo extra" class="time" identificador="{{$i->cedula}}"><i class="fas fa-stopwatch"></i><span id="{{$i->cedula}}t" class="badge badge-pill badge-secondary">5</span></a>
                                </td>
                                <td class="center">
                                    <a href="{{ route('empleados.edit', $i->cedula) }}"><i class="fas fa-edit" style="color:#17a2b8" title="Editar"></i></a>
                                </td>
                                <td class="center">
                                    <a padre="empleados{{$i->cedula}}" class="delete" ruta="empleados" identificador="{{$i->cedula}}" title="Eliminar" ><i class="fas fa-trash-alt" style="color:#c62828"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.time').click(function(){
            var id = $(this).attr('identificador');
            var pill = $('#'+id+'t');
            var entrada = ''+
            '<div class="form-group mb-2">'+
                '<label for="cedula"><strong><small style="color : #616161">Tiempo extra</small></strong></label>'+
                '<div class="input-group mb-2">'+
                    '<div class="input-group-prepend">'+
                        '<span class= "input-group-text">'+
                            '<i class="fas fa-stopwatch"></i>'+
                        '</span>'+
                    '</div>'+
                    '<select class="custom-select custom-select-sm" name="role" id="role">'+
                        '<option value="0">Un dia</option>'+
                        '<option value="1">Tres dias</option>'+
                        '<option value="2" selected>Una semana</option>'+
                    '</select>'+
                '</div>'+
            '</div>'
            modalConfirm(function(confirm){
                $("#exampleModalCenter").modal('hide');
                if(confirm){
                    // deleteRegistro(ruta, id, padre)
                }
            },'¿Desea agregar tiempo extra?', entrada, true);
        });
    });    
</script>
@endsection
