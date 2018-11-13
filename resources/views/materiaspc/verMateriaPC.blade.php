
	{{-- Guia Front --}}
	{{-- Se envía el objeto $materiapc--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion show() 
		 @Autor Paola C. --}}
	{{-- Estado: Terminada --}}
	{{-- URL: localhost:8000\estudiantes\{pk_estudiante} --}}

	<h3>Tipo de Archivos:</h3> $materia: {{ gettype($materiapc)}} <br>
	<h3>Contenido materia:</h3> {{$materiapc}} <br>

	<h1>{{$materiapc->materia}}</h1>
	Profesor: <a href="/empleados/{{$materiapc->fk_empleado}}">{{ucwords($materiapc->nombre)}} {{ucwords($materiapc->apellido)}}</a> <br>
	Curso: <a href="/cursos/{{$materiapc->fk_curso}}">{{$materiapc->curso}} </a><br>
	Salon: {{$materiapc->salon}} <br>
	Logros Custom: {{$materiapc->logros_custom}} <br>
