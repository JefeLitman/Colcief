@extends('contenedores.profesor')
@section('titulo',' Horarios')
@section('contenedor_profesor')
<br>
@isset($curso)
    {{$curso->prefijo}} - {{$curso->sufijo}}
@endisset
<div class="container">
    @include('horarios.horario', ['horarios' => $empleado])
</div>
@endsection