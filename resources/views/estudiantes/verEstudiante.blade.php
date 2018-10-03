@extends('contenedores.admin')
@section('titulo','Ver estudiantes')
@section('contenedor_principal')

	{{-- Guia Front --}}
	{{-- Se envía el objeto $estudiante y el objeto $acudiente --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>EstudianteController.php  funcion show()
		 @Autor Paola C. --}}
	{{-- URL: localhost:8000\estudiantes\{pk_estudiante} --}}
	<h3>Tipo de Archivos:</h3> $estudiante: {{ gettype($estudiante)}}, $acudiente: {{ gettype($acudiente)}} <br>
	<h3>Contenido estudiante:</h3> {{$estudiante}} <br>
	<h3>Contenido acudiente:</h3> {{$acudiente}} <br>

	<h1>Ejemplos</h1>
	Foto:
		<img src="{{Storage::url($estudiante->foto)}}" width="200px">
		<br>
	Nombre: {{$estudiante->nombre}} <br>
	Apellido: {{$estudiante->apellido}} <br>
@endsection
