@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')

<br id="br">
<div class="container">
    <div class="accordion" id="accordionExample">
        @php
            $i=0;
        @endphp
        @foreach ($materiaPCs as $key => $materia)
            <div class="card mx-auto border-dark bg-light" style="border-color:#66bb6a !important;">
                <div id="headingOne">
                    <div class="card-header" style="background-color:#66ba6a7d !important; cursor: pointer;" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}" >
                        <h5 class="text-center mb-0">
                            {{$materia->materia_nombre}} {{$materia->prefijo}}-{{$materia->sufijo}}
                        </h5>
                        <h5 class="text-right mb-0">
                            <a href="{{ route('crearHorario', $materia->pk_materia_pc)}}" style="text-decoration:none !important; color:#004d40 !important;"><i class="fas fa-user-plus cambiob"></i></a>
                        </h5>
                    </div>
                </div>
                <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mr-auto">
                                <thead>
                                    <tr>
                                        <th scope="col" style="color:#00695c" class="text-center"> Nombre del profesor </th>
                                        <th scope="col" style="color:#00695c" class="text-center">Día</th>
                                        <th scope="col" style="color:#00695c" class="text-center">Horas</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        {{--  nombre del profe  --}}
                                        <td class="text-center"> {{$materia->nombre}} {{$materia->apellido}}</td>
                                     @foreach($horarios[$key] as $horario)
                                        {{--  Dia  --}}
                                        <td class="text-center"> {{$horario->dia}}</td>
                                        {{--  horas  --}}
                                        <td class="text-center"> {{substr($horario->hora_inicio, 0, 5)}} - {{substr($horario->hora_fin, 0, 5)}}</td>
                                        {{-- editar materia --}}
                                        <td class="text-center"><a href="{{ route('horarios.edit', $horario->pk_horario)}}"><i class="fas fa-edit" style="color:#00838f"></i>
                                        </a></td>
                                        {{-- eliminar materia --}}
                                        <td>
                                            <form action="{{route('horarios.destroy', $horario->pk_horario)}}" method = "post">
                                                @csrf
                                                @method("DELETE")
                                                <i class="fas fa-trash-alt" style="color:#c62828; cursor: pointer;" type="submit"></i>
                                            </form>
                                        </td>
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
