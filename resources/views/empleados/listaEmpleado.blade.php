@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Empleados')
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
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
                            <th class="center" scope="col" style="color:#00695c">Cargo</th>
                            <th class="center" scope="col" style="color:#00695c" colspan="4">Acciones</th>
                        </tr>
                    </thead>
                    @php
                        $cargo = ['Administrador', 'Director', 'Profesor', 'Coordinador']
                    @endphp
                    <tbody>
                        @foreach ($empleado as $i)
                            <tr id="empleados{{$i->cedula}}">
                                <td class="center" scope="row">{{$i->cedula}}</td>
                                <td class="center">{{ucwords($i->nombre)}} {{ucwords($i->apellido)}}</td>
                                <td class="center">{{ucwords($cargo[$i->role])}}</td>
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
@endsection
