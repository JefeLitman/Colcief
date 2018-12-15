@extends('contenedores.estudiante')
@section('titulo',' Horarios')
@section('contenedor_estudiante')
<br>
<div class="container" style="background:#fafafa !important;">
    <h1 class="card-title text-center">
        Horario
    </h1>
    @include('horarios.horario', ['horarios' => $estudiante])
</div>
@endsection
