@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')

<h1>Lista horarios</h1>

@foreach ($materias as $materia)
    <ul>
        <li><a href="/horarios/{{$materia->pk_materia}}">{{$materia->nombre}}</a></li>
    </ul>
@endforeach

@endsection