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
		height: 100%;
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
		<div class="col-lg-10 col-md-12">
			<h4>Linea Temporal</h4>
			<ul class="timeline">
				@php
					$bandera = true;
				@endphp
				@foreach ($fechas as $key => $fecha)
					<li 
					@if ($key == 'Hoy') 
						class = "hoy" 
						@php $bandera = false @endphp
					@endif 
					@if ($bandera) 
						class = "pasado" 
					@endif>
						<a target="_blank" href="">{{$key}}</a>
						<a id="{{explode('-', $fecha)[1]}}" href="#" class="float-right hidden-md-down">{{explode('-', $fecha)[2].' de '.ucwords(strftime('%B', strtotime($fecha))).', '.explode('-', $fecha)[0]}}</a>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection