@extends('contenedores.estudiante')
@section('titulo',' Horarios')
@section('contenedor_estudiante')
<br>
<div class="container">
    @include('horarios.horario', ['horarios' => $estudiante])
</div>