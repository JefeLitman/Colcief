@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')

<h1>Lista horarios</h1>

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
@endforeach

@endsection