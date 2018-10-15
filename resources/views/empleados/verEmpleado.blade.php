<!DOCTYPE html>
<html>
<head>
	<title>Estudiante</title>
</head>
<body>
	{{-- Guia Front --}}
	{{-- Se envía el objeto $empleado --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>EmpleadoController.php  funcion show() 
		 @Autor Paola C. --}}
	{{-- URL: localhost:8000\empleados\{pk_empleado} --}}
	<h3>Tipo de Archivos:</h3> $estudiante: {{ gettype($empleado)}} <br>
	<h3>Contenido acudiente:</h3> {{$empleado}} <br>

	<h1>Ejemplos</h1>
	Foto:
		<img src="{{Storage::url($empleado->foto)}}" width="200px">
		<br>
	Nombre: {{$empleado->nombre}} <br>
	Apellido: {{$empleado->apellido}} <br>

</body>
</html>