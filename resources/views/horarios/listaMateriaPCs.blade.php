@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')

<h1>Lista horarios</h1>

@foreach ($materiaPCs as $key => $materia)
    <ul>
        <table>
            <thead>
                <tr>
                    <th>{{$materia->materia_nombre}} {{$materia->prefijo}}-{{$materia->sufijo}} <a href="/horarios/{{$materia->pk_materia_pc}}/crear">Crear</a></th>
                </tr>
                <tr>
                    <td>{{$materia->nombre}} {{$materia->apellido}}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @foreach ($horarios[$key] as $horario)
                            {{$horario->dia}} {{substr($horario->hora_inicio, 0, 5)}} - {{substr($horario->hora_fin, 0, 5)}} <a href="/horarios/{{$horario->pk_horario}}/editar">Editar</a> ||
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- <li>{{$materia->fk_materia_pc}}</li>
        <li>{{$materia->dia}}</li>
        <li>{{$materia->hora_inicio}}</li>
        <li>{{$materia->hora_fin}}</li> --}}
    </ul>
@endforeach

@endsection