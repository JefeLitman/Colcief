@extends('contenedores.profesor')
@section('titulo','Materia-Profesor-Curso Nuevo')
@section('contenedor_profesor')
{{-- mensajes de error --}}

	{{-- Guia Front --}}
	{{-- Se envía el objeto $materiapc y $periodos--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion indexPlanillasProfesor()
		 @Autor Paola C. --}}
	{{-- Estado: Aparentemente finalizado (Sujeto a cambios) --}}
	{{-- URL: localhost:8000/materiaspc/{pk_materia_pc}/planillas  -> Logeado en un usuario de tipo profesor--}}

	{{-- <h3>Tipo de Archivos:</h3> $result: {{ gettype($result)}} <br>
	<h3>Contenido materias:</h3> Ejemplo: $result={"Etica":[[1,"8-2"],[2,"8-2"]],"Software":[[3,"8-2"]]} <br> --}}

    <br id="br">
    <div class="container" style="background:#fafafa !important;">
        <h4 class="text-center">{{ucwords($materiapc->nombre)}}</h4> 
        <br>
    </div>
</div>
<script src="{{ asset('js/ajax.js') }}"></script>
@endsection
