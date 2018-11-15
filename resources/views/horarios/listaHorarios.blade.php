@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')

<h1>Lista horarios</h1>

@foreach ($horarios as $horario)
    <ul>
        <li>{{$horario->pk_horario}}</li>
        <li>{{$horario->fk_materia_pc}}</li>
        <li>{{$horario->dia}}</li>
        <li>{{$horario->hora_inicio}}</li>
        <li>{{$horario->hora_fin}}</li>
    </ul>
@endforeach

@endsection