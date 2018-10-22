<!DOCTYPE html>
<html>
<head>
	<title>Estudiante</title>
</head>
<body>
	{{-- Guia Front --}}
	{{-- Se envía array de objetos $materias --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaController.php  funcion index() 
		 @Autor Paola C. --}}
	{{-- URL: localhost:8000\materias --}}
	<h3>Tipo de Archivos:</h3> $materias: {{ gettype($materias)}} <br>
	<h3>Contenido materias:</h3> {{$materias}} <br>

	 <h1>Ejemplos</h1>
	
	@for ($i = 1; $i <=count($materias); $i++)
    	<h2>Materia {{ $i }}</h2>
    	PK_materia: {{ $materias[$i-1]->pk_materia }}<br>
    	Nombre: {{$materias[$i-1]->nombre}} <br>
    	Contenido: {{$materias[$i-1]->contenido}} <br>
	@endfor

	<h1>Ejemplo 2</h1>
	<h2>Materias</h2>
	@foreach ($materias as $materia)
    	PK_materia: {{ $materia->pk_materia }}<br>
    	Nombre: {{$materia->nombre}} <br>
    	Contenido: {{$materia->contenido}} <br><br>
	@endforeach
</body>
</html>