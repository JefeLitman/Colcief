@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')

<br id="br">
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="accordion" id="accordionExample">
                @csrf
                @php
                    $i=0;
                @endphp
                @foreach ($materiaPCs as $key => $materia)
                    <div class="card mx-auto border-dark bg-light" style="border-color:#17a2b8 !important;">
                        <div id="headingOne">
                            <div class="card-header" style="background-color: rgba(0,0,0,.03) !important; cursor: pointer;" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <h5 class="text-center mb-0">
                                            {{$materia->materia_nombre}} {{$materia->prefijo}}-{{$materia->sufijo}}
                                        </h5>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ route('crearHorario', $materia->pk_materia_pc)}}" style="text-decoration:none !important; color:#17a2b8 !important;" title="Crear horario"><i class="fas fa-user-plus cambiob"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-condensed table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="color:#00695c" class="text-center"> Nombre del profesor </th>
                                                <th scope="col" style="color:#00695c" class="text-center">Día</th>
                                                <th scope="col" style="color:#00695c" class="text-center">Horas</th>
                                                <th  scope="col" style="color:#00695c" class="text-center" colspan="2">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($horarios[$key] as $horario)
                                            <tr id="horarios{{$horario->pk_horario}}">
                                                {{--  nombre del profe  --}}
                                                <td class="text-center"> {{$materia->nombre}} {{$materia->apellido}}</td>
                                                {{--  Dia  --}}
                                                <td class="text-center"> {{$horario->dia}}</td>
                                                {{--  horas  --}}
                                                <td class="text-center"> {{substr($horario->hora_inicio, 0, 5)}} - {{substr($horario->hora_fin, 0, 5)}}</td>
                                                {{-- editar horario --}}
                                                <td class="text-center">
                                                    <a href="{{ route('horarios.edit', $horario->pk_horario)}}" title="Editar horario">
                                                        <i class="fas fa-edit cambiob" style="color:#17a2b8"></i>
                                                    </a>
                                                </td>
                                                {{-- Eliminar horario --}}
                                                <td class="text-center">
                                                    <a padre="horarios{{$horario->pk_horario}}" class="delete" ruta="horarios" identificador="{{$horario->pk_horario}}" title="Eliminar horario">
                                                        <i class="fas fa-trash-alt cambiobe" style="color:#c62828"></i>
                                                    </a>
                                                </td>
                                                {{-- eliminar materia --}}
                                                {{-- <td class="text-center">

                                                    <form action="{{route('horarios.destroy',$horario->pk_horario)}}" method = "post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <i class="fas fa-trash-alt" style="color:#c62828" type="submit"></i>
                                                        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt" style="color:#c62828"></i></button>
                                                    </form>
                                                </td> --}}
                                                {{-- ver --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  @endfor  --}}
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
</div>
<br>
{{-- <h1>Lista horarios</h1>

@foreach ($materiaPCs as $key => $materia)
    <ul>
        <table>
            <thead>
                <tr>
                    <th>{{$materia->materia_nombre}} {{$materia->prefijo}}-{{$materia->sufijo}} <a href="{{ route('crearHorario', $materia->pk_materia_pc)}}">Crear</a></th>
                </tr>
                <tr>
                    <td>{{$materia->nombre}} {{$materia->apellido}}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @foreach ($horarios[$key] as $horario)
                            {{$horario->dia}} {{substr($horario->hora_inicio, 0, 5)}} - {{substr($horario->hora_fin, 0, 5)}} <a href="{{ route('horarios.edit', $horario->pk_horario)}}">Editar</a>
                            <form action="{{route('horarios.destroy', $horario->pk_horario)}}" method = "post">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Eliminar</button>
                            </form>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </ul>
@endforeach --}}

@endsection
