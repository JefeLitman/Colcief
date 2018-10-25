@extends('contenedores.estudiante')
@section('titulo',ucwords(session('user')['nombre']))
@section('contenedor_estudiante')
<br>
<h1>PERIODO {{$periodo}}</h1>
<br>
@endsection