@extends('contenedores.admin')
@section('titulo','Empleado Nuevo')
@section('contenedor_admin')
{{-- mensajes de error --}}
@include('error.error')
	{{-- Guia Front --}}
	{{-- Se envía el objeto $materia --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaController.php  funcion show()
		 @Autor Paola C. --}}
	{{-- URL: localhost:8000\materia\{pk_materia} --}}
	<h3>Tipo de Archivos:</h3> $materia: {{ gettype($materia)}} <br>
	<h3>Contenido materia:</h3> {{$materia}} <br>

	<h1>Ejemplos</h1>
	Nombre: {{$materia->nombre}} <br>
	Apellido: {{$materia->contenido}} <br>
@endsection
