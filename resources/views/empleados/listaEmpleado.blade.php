@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Empleados')
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-11">
            <form action="" id="autocompletar">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1" style="background-color:#00acc1;"><i class="fas fa-search" style="color:white;"></i></span>
                    </div>
                    <input type="text" class="form-control"  id="autocomplete-input" class="autocomplete" placeholder="Nombre" aria-label="lead" aria-describedby="basic-addon1">
                </div>
            </form>
            <br>
            <div class="alert alert-light alert-dismissible fade show" style="border-color: #818182" role="alert">
                <div class="row">
                    <div class="col">
                        <strong>Tiempo extra</strong>
                    </div>
                    <div class="col">
                        <i class="fas fa-stopwatch text-dark"></i> 0 dias
                    </div>
                    <div class="col">
                        <i class="fas fa-stopwatch text-primary"></i> 1 dia
                    </div>
                    <div class="col">
                        <i class="fas fa-stopwatch text-warning"></i> 3 dias
                    </div>
                    <div class="col">
                        <i class="fas fa-stopwatch text-danger"></i> 7 dias
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-condensed table-hover text-center">
                    <thead>
                        <tr>
                            <th class="center" scope="col" style="color:#00695c">Cedula</th>
                            <th class="center" scope="col" style="color:#00695c">Nombre</th>
                            <th class="center" scope="col" style="color:#00695c">Cargo</th>
                            <th class="center" scope="col" style="color:#00695c" colspan="4">Acciones</th>
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
                                <td class="center">{{ucwords($i->nombre)}} {{ucwords($i->apellido)}}</td>
                                <td class="center">{{ucwords($cargo[$i->role])}}</td>
                                <td class="center">
                                    <a title="Agregar tiempo extra" class="
                                    @if($i->role != 0)
                                        time
                                    @endif
                                    " identificador="{{$i->cedula}}"><i
                                    @switch($i->tiempo_extra)
                                        @case(1)
                                            style="color:#007bff"
                                            @break
                                        @case(3)
                                            style="color:#ffc107"
                                            @break
                                        @case(7)
                                            style="color:#dc3545"
                                            @break
                                        @default
                                            style="color:#343a40"
                                    @endswitch
                                    id="{{$i->cedula}}t" class="fas fa-stopwatch
                                    @if($i->role == 0)
                                        text-secondary
                                    @endif
                                    "></i></a>
                                </td>
                                <td class="center">
                                    <a href="{{ route('empleados.edit', $i->cedula) }}"><i class="fas fa-edit" style="color:#17a2b8" title="Editar"></i></a>
                                </td>
                                {{-- Eliminar empleado --}}
                                <td class="center">
                                    <a href="{{ route('empleados.show', $i->cedula) }}"><i class="fas fa-eye" title="Ver empleado" style="color:#17a2b8"></i></a>
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
            var icon = $('#'+id+'t');
            var entrada = ''+
            '<div class="form-group mb-2">'+
                '<label for="cedula"><strong><small style="color : #616161">Tiempo extra</small></strong></label>'+
                '<div class="input-group mb-2">'+
                    '<div class="input-group-prepend">'+
                        '<span class= "input-group-text">'+
                            '<i class="fas fa-stopwatch"></i>'+
                        '</span>'+
                    '</div>'+
                    '<select class="custom-select custom-select-sm" name="time" id="time">'+
                        '<option value="0">Seleccionar</option>'+
                        '<option value="1">Un dia</option>'+
                        '<option value="3">Tres dias</option>'+
                        '<option value="7">Una semana</option>'+
                    '</select>'+
                '</div>'+
            '</div>'
            modalConfirm(function(confirm){
                $("#exampleModalCenter").modal('hide');
                if(confirm){
                    var time = $('#time').val();
                    var color = '';
                    switch (time) {
                        case '1':
                            color = '#007bff';
                            break;
                        case '3':
                            color = '#ffc107';
                            break;
                        case '7':
                            color = '#dc3545';
                            break;
                        default:
                            color = '#343a40';
                            break;
                    }
                    $.ajax({
                        type: 'POST',
                        url: '/empleados/'+id+'/time/'+time,
                        data: {_token:$('#csrf_token').attr('content'), _method:'PUT'},
                        success: function(data) {
                            icon.css({'color':color});
                        }
                    });
                }
            },'¿Desea agregar tiempo extra?', entrada, true);
        });
    });
</script>
@endsection
