<!DOCTYPE html>
<html>
<head>
	<title>Estudiante</title>
</head>
<body>
	{{ gettype($empleado)}} <br>
	{{$empleado}} <br>

	<h1>Ejemplo</h1>
	Nombre: {{$empleado->nombre}} <br>
	Apellido: {{$empleado->apellido}} <br>

</body>
</html>