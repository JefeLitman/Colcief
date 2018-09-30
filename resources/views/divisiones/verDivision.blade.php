<!DOCTYPE html>
<html>
<head>
	<title>Division - Ver</title>
</head>
<body>
	@foreach ($div as $division)
		<h3>Contenido division:</h3> {{$division}} <br>

		<h1>Ejemplos</h1>
		
		Nombre: {{$division->nombre}} <br>
		Descripcion: {{$division->descripcion}} <br>
		Porcentaje: {{$division->porcentaje}} <br>
		Año: {{$division->ano}} <br>
	@endforeach

</body>
</html>