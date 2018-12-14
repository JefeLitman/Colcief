@extends('contenedores.estudiante')
@section('titulo',' Horarios')
@section('contenedor_estudiante')
<br>
<div class="container" style="background:#fafafa !important;">
    @include('horarios.horario', ['horarios' => $estudiante])
</div>
@endsection
