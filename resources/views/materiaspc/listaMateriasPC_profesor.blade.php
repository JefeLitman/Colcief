<!DOCTYPE html>
<html>
<head>
	<title>MateriaPC</title>
</head>
<body>
	{{-- Guia Front --}}
	{{-- Se envía el objeto $result--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion index() 
		 @Autor Paola C. --}}
	{{-- Estado: Aparentemente finalizado (Sujeto a cambios) --}}
	{{-- URL: localhost:8000\materiaspc  -> Logeado en un usuario de tipo profesor--}}
	
	<h3>Tipo de Archivos:</h3> $result: {{ gettype($result)}} <br>
	<h3>Contenido materias:</h3> Ejemplo: $result={"Etica":[[1,"8-2"],[2,"8-2"]],"Software":[[3,"8-2"]]} <br> 

	<h1>Ejemplo</h1>
	<h2>Materias</h2>
	@foreach ($result as $materia => $materias_pc)
		<h3>{{ $materia }}</h2>
			@foreach($materias_pc as $i)
				pk_materia_pc: {{$i[0]}} <br>
				Curso: {{$i[1]}} <br> <br>
			@endforeach
		<br>
	@endforeach
</body>
</html>