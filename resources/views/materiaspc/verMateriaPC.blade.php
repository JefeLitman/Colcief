@extends('contenedores.'.((session('role')=='administrador')?'admin':session('role')))
@section('titulo','Ver Materia - Profesor - Curso')
@section('contenedor_'.((session('role')=='administrador')?'admin':session('role')))
{{-- mensajes de error --}}

	{{-- Guia Front --}}
	{{-- Se envía el objeto $materiapc--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion show()
		 @Autor Paola C. --}}
	{{-- Estado: Terminada --}}
	{{-- URL: localhost:8000\estudiantes\{pk_estudiante} --}}

	{{-- <h3>Tipo de Archivos:</h3> $materia: {{ gettype($materiapc)}} <br>
	<h3>Contenido materia:</h3> {{$materiapc}} <br> --}}
<br>
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content">
        <div class="col-md-10">
            <div class="card mx-auto border-dark bg-light" style="width: 20rem; border-color:#17a2b8 !important;">
                    <div class="card-header" style="background-color:rgba(0,0,0,.03) !important;">
                        <h2 class="text-center">{{$materiapc->materia}}</h2>
                    </div>
                <ul class="list-group list-group-flush">
                    {{-- profesor --}}
                    <li class="list-group-item text-center" style="border-top-color: #17a2b8 !important; border-bottom-color: #17a2b8 !important;">
                        <h5 class="card-title text-center">
                            <i class="fas fa-user-tie"></i><br>
                                <a href="/empleados/{{$materiapc->fk_empleado}}">{{ucwords($materiapc->nombre)}} {{ucwords($materiapc->apellido)}}</a>
                        </h5>
                    </li>

                    {{-- curso --}}
                    <li class="list-group-item text-center" style="border-top-color: #17a2b8 !important; border-bottom-color: #17a2b8 !important;">
                        <h5 class="card-title text-center">
                            {{-- <i class="fas fa-pen"></i>   --}}
                            Curso:
                            <a href="/cursos/{{$materiapc->fk_curso}}">{{$materiapc->curso}} </a>
                        </h5>
                    </li>

                    {{-- salon --}}
                    <li class="list-group-item text-center" style="border-top-color: #17a2b8 !important; border-bottom-color: #17a2b8 !important;">
                        <h5 class="card-title text-center">
                            Salón: {{$materiapc->salon}}
                            {{-- <i class="fas fa-chalkboard-teacher"></i> --}}
                        </h5>
                    </li>

                    {{-- logros --}}
                    <li class="list-group-item text-center" style="border-top-color: #17a2b8 !important; border-bottom-color: #17a2b8 !important;">
                        <h5 class="card-title text-center">
                            <i class="fas fa-star"></i><br>
                            {{$materiapc->logros_custom}}
                        </h5>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
