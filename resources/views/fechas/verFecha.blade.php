@extends('contenedores.admin')
@section('titulo','Linea Temporal')
@section('contenedor_admin')

<style>
	ul.timeline {
		list-style-type: none;
		position: relative;
	}
	.hoy:before {
		background: #6c757d !important;
		border: 3px solid #6c757d !important;
	}
	.pasado:before {
		background: #28a745 !important;
		border: 3px solid #28a745 !important;
	}
	ul.timeline:before {
		content: ' ';
		background: #d4d9df;
		display: inline-block;
		position: absolute;
		left: 29px;
		width: 2px;
		height: 99%;
		z-index: 400;
	}
	ul.timeline > li {
		margin: 20px 0;
		padding-left: 20px;
	}
	ul.timeline > li:before {
		content: ' ';
		background: white;
		display: inline-block;
		position: absolute;
		border-radius: 50%;
		border: 1px solid #22c0e8;
		left: 20px;
		width: 20px;
		height: 20px;
		z-index: 400;
	}
</style>

<div class="container">
	<div class="row justify-content-center" style="background-color: #fafafa !important;">
		<div class="col-10">
			<h4>Linea Temporal</h4>
			<ul class="timeline">
				@php
					$bandera = true; 
					// true : la fecha comparada es mayor a la fecha de hoy (NO ha transcurrido el evento)
					// false : la fecha comparada es menor a la fecha de hoy (ya transcurrido el evento)
				@endphp
				@foreach ($orden as $key => $o)
					<li 
					@if ($key == 'Hoy') 
						class = "hoy" 
						@php $bandera = false @endphp
					@endif 
					@if ($bandera) 
						class = "pasado"
					@endif >
						<div>
							@if ($fecha['Hoy'] != $o && !$bandera)
								<a title="Editar" href="
									@if (isset($fecha[$key]['id'])) 
										{{route($fecha[$key]['tipo'], $fecha[$key]['id'])}}
									@else
										{{route($fecha[$key]['tipo'])}}
									@endif
								"><i class="fas fa-edit" style="color:#00838f;margin-right:6px"></i></a>
							@else
								<a title="No se puede editar"><i class="fas fa-edit" style="color:#6c757d;margin-right:6px"></i></a>
							@endif
							
							{{$key}}
							<div class="float-right d-none d-sm-block">{{explode('-', $o)[2].' de '.ucwords(strftime('%B', strtotime($o))).', '.explode('-', $o)[0]}}</div>
						</div>
						
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection