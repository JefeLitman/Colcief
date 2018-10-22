<!DOCTYPE html>
<html>
<head>
	<title>Estudiante</title>
</head>
<body>
	{{-- Guia Front --}}
	{{-- Se envía el objeto $materia --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaController.php  funcion show() 
		 @Autor Paola C. --}}
	{{-- URL: localhost:8000\materia\{pk_materia} --}}
	<h3>Tipo de Archivos:</h3> $materia: {{ gettype($materia)}} <br>
	<h3>Contenido materia:</h3> {{$materia}} <br>

	<h1>Ejemplos</h1>
	Nombre: {{$estudiante->nombre}} <br>
	Apellido: {{$estudiante->apellido}} <br> --}}

</body>
</html>