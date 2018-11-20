@extends('contenedores.admin')
@section('titulo','Materia-Profesor-Curso Nuevo')
@section('contenedor_admin')
{{-- mensajes de error --}}
@include('error.error')
	{{-- Guia Front --}}
	{{-- Se envía el objeto $result--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion index()
		 @Autor Paola C. --}}
	{{-- Estado: Aparentemente finalizado (Sujeto a cambios) --}}
	{{-- URL: localhost:8000\materiaspc  -> Logeado en un usuario de tipo administrador--}}
<br>
<div class="container">

</div>
	<h3>Tipo de Archivos:</h3> $result: {{ gettype($result)}} <br>
	<h3>Contenido materias:</h3> Ejemplo: $result={"Etica":[[1,"edward","caballero","8-2"],[2,"edward","caballero","8-2"]],"Software":[[3,"paola","caicedo","8-2"]]} <br>

	<h1>Ejemplo</h1>
	<h2>Materias</h2>
	@foreach ($result as $materia => $materias_pc)
		<h3>{{ $materia }}</h2>
			@foreach($materias_pc as $i)
				pk_materia_pc: {{$i[0]}} <br>
				Nombre profesor: {{$i[1]}} <br>
				Apellido profesor: {{$i[2]}} <br>
				Curso: {{$i[3]}} <br> <br>
			@endforeach
		<br>
	@endforeach
@endsection
