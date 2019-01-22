@extends('contenedores.estudiante')
@section('titulo','Materias')
@section('contenedor_estudiante')

	{{-- Guia Front --}}
	{{-- Se envía el objeto $periodos,$recuperacion,$nivelacion--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>NivelacionController.php  funcion index()
		 @Autor Paola C. --}}
	{{-- Estado: Aparentemente finalizado (Sujeto a cambios) --}}
    {{-- URL: localhost:8000\nivelaciones  -> Logeado en un usuario de tipo profesor--}}
	<h1>Nivelaciones</h1>
	@foreach ($periodos as $p)
		<h2>Periodos {{$p->nro_periodo}}</h2>
		@if (count($recuperacion[$p->pk_periodo])==0)
			&nbsp &nbsp &nbsp No hay periodos perdidos
		@else
			@foreach ($recuperacion[$p->pk_periodo] as $r)
				&nbsp &nbsp &nbsp	<b>Pk: </b> {{$r->pk_recuperacion}} <b>Materia:</b> {{$r->materia}} <b>Profesor:</b> {{ucwords($r->nombre)}} {{ucwords($r->apellido)}} <b>Nota:</b> {{$r->nota}}
			@endforeach
		@endif
		
	@endforeach
	<h2>Materias perdidas en definitiva</h2>
	@if (count($nivelacion)==0)
		&nbsp &nbsp &nbsp No hay materias perdidas
	@else
		@foreach ($nivelacion as $n)
		&nbsp &nbsp &nbsp	<b>Pk: </b> {{$n->pk_nivelacion}} <b>Curso:</b> {{($n->prefijo==0)?"Preescolar":$n->prefijo}}-{{$n->sufijo}}   <b>Materia:</b> {{$n->materia}} <b>Profesor:</b> {{ucwords($n->nombre)}} {{ucwords($n->apellido)}} <b>Nota:</b> {{$n->nota}}
		@endforeach
	@endif
	
@endsection