@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Periodos')
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <h4 class="text-center"> <i class="fas fa-calendar-check"></i> Periodos</h4>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-condensed table-hover text-center">
                    <thead>
                        <tr>
                            <th class="center" scope="col" style="color:#00695c">#</th>
                            <th class="center" scope="col" style="color:#00695c">Inicia periodo</th>
                            <th class="center" scope="col" style="color:#00695c" title="Tenga en cuenta que la fecha en el que finaliza el periodo es el ultimo dia en el que el docente puede modifcar notas del periodo">Finaliza periodo</th>
                            <th class="center" scope="col" style="color:#00695c">Inicia recuperación</th>
                            <th class="center" scope="col" style="color:#00695c">Finaliza recuperación</th>
                            @if (session('role') == 'administrador')
                                <th class="center" scope="col" style="color:#00695c">Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periodos as $i)
                            <tr id="empleados{{$i->pk_periodo}}">
                                <td class="center" >{{$i->nro_periodo}}</td>
                                <td class="center">{{explode('-', $i->fecha_inicio)[2].' de '.ucwords(strftime('%B', strtotime($i->fecha_inicio)))}}</td>
                                <td title="Tenga en cuenta que la fecha limite es el ultimo dia en el que el docente puede modifcar notas del periodo" class="center">{{explode('-', $i->fecha_limite)[2].' de '.ucwords(strftime('%B', strtotime($i->fecha_limite)))}}</td>
                                <td class="center">{{explode('-', $i->recuperacion_inicio)[2].' de '.ucwords(strftime('%B', strtotime($i->recuperacion_inicio)))}}</td>
                                <td class="center">{{explode('-', $i->recuperacion_limite)[2].' de '.ucwords(strftime('%B', strtotime($i->recuperacion_limite)))}}</td>
                                @if (session('role') == 'administrador')
                                    <td class="center">
                                        <a href="{{ route('periodos.edit', $i->pk_periodo) }}"><i class="fas fa-edit" style="color:#17a2b8" title="Editar"></i></a>
                                    </td>    
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
