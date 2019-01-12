@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Periodos')
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
                            <th class="center" scope="col" style="color:#00695c">#</th>
                            <th class="center" scope="col" style="color:#00695c">Fecha de inicio</th>
                            <th class="center" scope="col" style="color:#00695c" title="Tenga en cuenta que la fecha limite es el ultimo dia en el que el docente puede modifcar notas del periodo">Fecha Limite</th>
                            <th class="center" scope="col" style="color:#00695c">Acciones</th>
                            {{-- <th>Editar</th>
                            <th>Eliminar</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periodos as $i)
                            <tr id="empleados{{$i->pk_periodo}}">
                                <td class="center" >{{$i->nro_periodo}}</td>
                                <td class="center">{{explode('-', $i->fecha_inicio)[2].' de '.ucwords(strftime('%B', strtotime($i->fecha_inicio))).', '.explode('-', $i->fecha_inicio)[0]}}</td>
                                <td title="Tenga en cuenta que la fecha limite es el ultimo dia en el que el docente puede modifcar notas del periodo" class="center">{{explode('-', $i->fecha_limite)[2].' de '.ucwords(strftime('%B', strtotime($i->fecha_limite))).', '.explode('-', $i->fecha_limite)[0]}}</td>
                                <td class="center">
                                    <a href="{{ route('periodos.edit', $i->pk_periodo) }}"><i class="fas fa-edit" style="color:#17a2b8" title="Editar"></i></a>
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
