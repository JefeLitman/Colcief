@extends('contenedores.admin')
@section('titulo','Linea Temporal')
@section('contenedor_admin')

<style>
	.success:before{
		background: #28a745!important;
	}
	.secondary:before{
		background: #17a2b8!important;
	}
	.right {
		margin-left: 55%;
	}
	.left {
		margin-right: 55%;
	}
	ul.timeline {
		padding-left:0px !important;
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
		left: 50%;
		width: 2px;
		height: 99%;
		z-index: 400;
	}
	ul.timeline > li {
		margin: 20px 0;
		/* padding-left: 20px; */
	}
	ul.timeline > li:before {
		content: ' ';
		background: #6c757d;
		display: inline-block;
		position: absolute;
		border-radius: 50%;
		left: calc(50% - 9px);
		width: 20px;
		height: 20px;
		z-index: 400;
	}
	@media (max-width: 568px){
		ul.timeline > li:before {
			display:none !important;
		}

		ul.timeline:before {
			display:none !important;
		}

		ul.timeline {
			padding-left:0px !important;
		}
		.right {
			margin-left: 0px;
		}
		.left {
			margin-right: 0px;
		}
	}
</style>

<div class="container">
	<div class="row justify-content-center" style="background-color: #fafafa !important;">
		<div class="col-md-10">
			<h4>Linea Temporal</h4>
			<ul class="timeline">
				@php
					$cont = 0;
					if(strtotime($orden['Hoy']) > strtotime($orden['Inicio del año escolar'])){
						$bandera = true;	
					} else {
						$bandera = false;
					}
				@endphp
				@foreach ($orden as $key => $card)
					@php
						$cont++;
					@endphp
					<li class="{{strtotime($orden['Hoy']) <= strtotime($card) ? '' : 'success'}} {{$key == 'Hoy' ? 'secondary' : ''}}">
						<div class="card mb-3 {{$cont%2 == 0 ? 'left' : 'right'}}">
							<div class="card-header">
								{{$key}}
								@if ((strtotime($orden['Hoy']) <= strtotime($card) && $key != 'Hoy'))
									@if ($bandera == true)
										@if ($key != 'Finalización del año escolar')
											<div class="float-right">
												@if (isset($fechas[$key]['fechas.edit']))
													<a href="{{route('fechas.edit')}}" title="Editar"><i class="fas fa-edit text-info"></i></a>
												@elseif (isset($fechas[$key]['pk_periodo']))
													<a href="{{route('periodos.edit', $fechas[$key]['pk_periodo'])}}" title="Editar"><i class="fas fa-edit text-info"></i></a>
												@endif
											</div>
										@endif
									@else
										<div class="float-right">
											@if (isset($fechas[$key]['fechas.edit']))
												<a href="{{route('fechas.edit')}}" title="Editar"><i class="fas fa-edit text-info"></i></a>
											@elseif (isset($fechas[$key]['pk_periodo']))
												<a href="{{route('periodos.edit', $fechas[$key]['pk_periodo'])}}" title="Editar"><i class="fas fa-edit text-info"></i></a>
											@endif
										</div>
									@endif
								@endif
							</div>
							<ul class="list-group list-group-flush">
								@foreach ($fechas[$key] as $l => $item)
									@unless ($l == 'pk_periodo' || $l == 'fechas.edit')
										<li class="list-group-item" style="padding: .3rem 1rem;">
											<small class="text-muted">{{$label[$l]}}</small>
											<div>{{explode('-', $item)[2].' de '.ucwords(strftime('%B', strtotime($item)))}}</div>
										</li>
									@endunless
								@endforeach
							</ul>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection