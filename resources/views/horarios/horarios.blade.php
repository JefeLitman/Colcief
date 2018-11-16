@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')

<h1>Lista horarios</h1>

<div class="container">
    <table>
        <thead>
            @foreach ($horarios as $key => $value)
                <th>{{$key}}</th>
            @endforeach
        </thead>
        <tbody>
            @foreach ($horarios as $horario)
                <tr>
                    @foreach ($horario as $item)
                        <td>{{$item->nombre}} {{$item->hora_inicio}} - {{$item->hora_inicio}}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection