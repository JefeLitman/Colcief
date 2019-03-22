@extends('contenedores.estudiante')
@section('titulo','Nivelaciones')
@section('contenedor_estudiante')

	{{-- Guia Front --}}
	{{-- Se envía el objeto $periodos,$recuperacion,$nivelacion--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>NivelacionController.php  funcion index()
		 @Autor Paola C. --}}
	{{-- Estado: Aparentemente finalizado (Sujeto a cambios) --}}
    {{-- URL: localhost:8000\nivelaciones  -> Logeado en un usuario de tipo estudiante--}}

	<br id="br">
	<div class="container" style="background:#fafafa !important;">
		<div class="row justify-content-center">
			<div class="col-md-11">
				<div class="card bg-light border-info">
					<h4 class="card-header text-center"><i class="fas fa-book"></i> Nivelaciones </h4>
					<div class="card-body">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							@php
								$j=0;
							@endphp
							@foreach ($periodos as $p)
								<li class="nav-item">
									<a class="nav-link @if($j==0) active @endif" id="tab{{$j}}" data-toggle="tab" href="#id{{$j}}" role="tab" aria-controls="id{{$j}}" aria-selected="true">Periodos {{$p->nro_periodo}}</a>
								</li>
							@php
								$j++;
							@endphp
							@endforeach
							<li class="nav-item">
								<a class="nav-link @if($j==0) active @endif" id="tab{{$j}}" data-toggle="tab" href="#id{{$j}}" role="tab" aria-controls="id{{$j}}" aria-selected="true">Materias perdidas en definitiva</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							@php
								$k=0;
							@endphp
							@foreach ($periodos as $p)
							<div class="tab-pane fade @if($k==0) show active @endif" id="id{{$k}}" role="tabpanel" aria-labelledby="tab{{$k}}">
								<div class="table-responsive">
										<table class="table table-striped table-condensed table-sm  table-hover text-center">
											<thead>
												<tr>
													<th scope="col" style="color:#00695c" class="text-center"> Materia </th>
													<th scope="col" style="color:#00695c" class="text-center"> Profesor </th>
													<th scope="col" style="color:#00695c" class="text-center"> Nota </th>
													<th scope="col" style="color:#00695c" class="text-center"> Acciones </th>
												</tr>
											</thead>
											<tbody>	
												@if (count($recuperacion[$p->pk_periodo])==0)
													<tr>
														<td colspan="4" class="text-center"> No hay periodos perdidos </td>
													</tr>
												@else
													@foreach ($recuperacion[$p->pk_periodo] as $r)
														<tr>	
															{{-- Materia --}}
															<td class="text-center"> {{$r->materia}} </td>
															{{-- Profesor --}}
															<td class="text-center"> {{ucwords($r->nombre)}} {{ucwords($r->apellido)}}</td>
															{{-- Nota --}}
															<td class="text-center">
																@if ($r->nota==null) 
																	-
																@else 
																	{{$r->nota}}
																@endif </td>
															{{-- Accion --}}
															<td class="text-center"><a href="/recuperaciones/{{$r->pk_recuperacion}}" data-toggle="tooltip" data-placement="right" title="Ver más"><i class="fas fa-eye text-info"  ></i></a></td>
														</tr>
													@endforeach
												@endif
											</tbody>
										</table>
								</div>
							</div>
							@php
								$k++;
							@endphp		
							@endforeach
							<div class="tab-pane fade @if($k==0) show active @endif" id="id{{$k}}" role="tabpanel" aria-labelledby="tab{{$k}}">
								<div class="table-responsive">
										<table class="table table-striped table-condensed table-sm  table-hover text-center">
											<thead>
												<tr>
													<th scope="col" style="color:#00695c" class="text-center"> Materia </th>
													<th scope="col" style="color:#00695c" class="text-center"> Profesor </th>
													<th scope="col" style="color:#00695c" class="text-center"> Curso/Año </th>
													<th scope="col" style="color:#00695c" class="text-center"> Nota </th>
													<th scope="col" style="color:#00695c" class="text-center"> Acciones </th>
												</tr>
											</thead>
											<tbody>	
												@if (count($nivelacion)==0)
													<tr>
														<td colspan="5" class="text-center"> No hay periodos perdidos </td>
													</tr>
												@else
													@foreach ($nivelacion as $n)
														<tr>	
															{{-- Materia --}}
															<td class="text-center"> {{$n->materia}} </td>
															{{-- Profesor --}}
															<td class="text-center"> {{ucwords($n->nombre)}} {{ucwords($n->apellido)}}</td>
															{{-- Curso --}}
															<td class="text-center"> {{($n->prefijo==0)?"Preescolar":$n->prefijo}}-{{$n->sufijo}} / {{$n->ano}}</td>
															{{-- Nota --}}
															<td class="text-center">
																@if ($n->nota==null) 
																	-
																@else 
																	{{$n->nota}}
																@endif
															</td>
															{{-- Acciones --}}
															<td class="text-center"><a href="/nivelaciones/{{$n->pk_nivelacion}}" data-toggle="tooltip" data-placement="right" title="Ver más" ><i class="fas fa-eye text-info"  ></i></a></td>
														</tr>
													@endforeach
												@endif
											</tbody>
										</table>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection