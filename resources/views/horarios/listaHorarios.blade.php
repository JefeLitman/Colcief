@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')

<h1>Lista horarios</h1>

@foreach ($materias as $materia)
    <ul>
        <li><a href="/horarios/{{$materia->pk_materia}}">{{$materia->nombre}}</a></li>
        {{-- <li>{{$materia->fk_materia_pc}}</li>
        <li>{{$materia->dia}}</li>
        <li>{{$materia->hora_inicio}}</li>
        <li>{{$materia->hora_fin}}</li> --}}
    </ul>
@endforeach

@endsection