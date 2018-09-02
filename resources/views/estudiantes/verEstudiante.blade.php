<!DOCTYPE html>
<html>
<head>
	<title>Estudiante</title>
</head>
<body>
	{{ gettype($estudiante)}} <br>
	{{$estudiante}} <br>
	{{$acudiente}} <br>

	<h1>Ejemplo</h1>
	Foto:
		<img src="{{Storage::url($estudiante->foto)}}">
		<br>
	Nombre: {{$estudiante->nombre}} <br>
	Apellido: {{$estudiante->apellido}} <br>

</body>
</html>