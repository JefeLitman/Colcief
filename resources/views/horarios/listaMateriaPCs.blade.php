@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')

<h1>Lista horarios</h1>

@foreach ($materiaPCs as $key => $materia)
    <ul>
        <table>
            <thead></thead>
            <tbody>
                <tr>
                    <td>{{$materia->materia_nombre}}</td>
                    <td>{{$materia->salon}}</td>
                    <td>{{$materia->nombre}} {{$materia->apellido}}</td>
                    <td>{{$materia->prefijo}}-{{$materia->sufijo}}</td>
                    <td>
                        <table>
                            <tr>
                                @foreach ($horarios[$key] as $horario)
                                    <td>{{$horario->hora_inicio}}</td>    
                                    <td>{{$horario->hora_fin}}</td>    
                                @endforeach
                            </tr>
                        </table>
                    </td>
                    <td><a href="/horarios/{{$pk_materia}}/{{$materia->pk_materia_pc}}/crear">Crear</a></td>
                    <td><a href="/horarios/{{$pk_materia}}/{{$materia->pk_materia_pc}}/editar">Editar</a></td>
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