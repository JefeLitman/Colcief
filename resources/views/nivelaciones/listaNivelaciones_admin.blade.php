@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo','Nivelaciones')

	{{-- Guia Front --}}
	{{-- Se envía el objeto $periodos,$recuperacion,$nivelacion--}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>NivelacionController.php  funcion index()
		 @Autor Paola C. --}}
	{{-- Estado: Aparentemente finalizado (Sujeto a cambios) --}}
    {{-- URL: localhost:8000\nivelaciones  -> Logeado en un usuario de tipo profesor--}}

	<br id="br">
	<div class="container" style="background:#fafafa !important;">
		<div class="row justify-content-center">
			<div class="col-md-11">
				<div class="card bg-light border-info">
					<h4 class="card-header text-center"><i class="fas fa-book"></i> Nivelaciones </h4>
					@php
						$bandera=true;
					@endphp
					<div class="card-body">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							@php
								$j=0;
							@endphp
							@foreach ($periodos as $p)
								<li class="nav-item">
									<a class="nav-link @if(strtotime(date('d-m-Y'))>=strtotime($p->recuperacion_inicio) and strtotime(date('d-m-Y'))<=strtotime($p->recuperacion_limite)) active" @php $bandera=false; @endphp @endif  id="tab{{$j}}" data-toggle="tab" href="#id{{$j}}" role="tab" aria-controls="id{{$j}}" aria-selected="true">Periodos {{$p->nro_periodo}}</a>
								</li>
							@php
								$j++;
							@endphp
							@endforeach
							<li class="nav-item">
								<a class="nav-link @if($bandera) active @endif" id="tab{{$j}}" data-toggle="tab" href="#id{{$j}}" role="tab" aria-controls="id{{$j}}" aria-selected="true">Materias perdidas en definitiva</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							@php
								$k=0;
							@endphp
							@foreach ($periodos as $p)
							<div class="tab-pane fade 
							@if(strtotime(date('d-m-Y'))>=strtotime($p->recuperacion_inicio) and strtotime(date('d-m-Y'))<=strtotime($p->recuperacion_limite)) 
							show active 
							@endif" 
							id="id{{$k}}" role="tabpanel" aria-labelledby="tab{{$k}}">
							<br>
							<div class="row">
								<div class="col-lg-3 col-lg-offset-3 center"></div>
								<div class="col-lg-6 col-lg-offset-6 center">
									<input type="text" id="search{{$k}}" value="" class="form-control" placeholder="Buscador">
								</div>
							</div>
							<br>
							<div class="table-responsive">
										<table class="table table-striped table-condensed table-sm  table-hover text-center">
											<thead>
												<tr>
													<th scope="col" style="color:#00695c" class="text-center"> Materia </th>
													<th scope="col" style="color:#00695c" class="text-center"> Estudiante </th>
													<th scope="col" style="color:#00695c" class="text-center"> Curso/Año </th>
													<th scope="col" style="color:#00695c" class="text-center"> Nota </th>
													<th scope="col" style="color:#00695c" class="text-center"> Acciones </th>
												</tr>
											</thead>
											<tbody id="search{{$k}}">	
												@if (count($recuperacion[$p->pk_periodo])==0)
													<tr>
														<td colspan="5" class="text-center"> No hay periodos perdidos </td>
													</tr>
												@else
													@foreach ($recuperacion[$p->pk_periodo] as $r)
														<tr>	
															{{-- Materia --}}
															<td class="text-center"> {{$r->materia}} </td>
															{{-- Estudiante --}}
															<td class="text-center"> {{ucwords($r->apellido)}} {{ucwords($r->nombre)}}</td>
															{{-- Curso --}}
															<td class="text-center"> {{($r->prefijo==0)?"Preescolar":$r->prefijo}}-{{$r->sufijo}} / {{$r->ano}}</td>
															{{-- Nota --}}
															<td class="text-center"> {{$r->nota or "-"}} </td>
															{{-- Accion --}}
															<td class="text-center">
																<a href="/recuperaciones/{{$r->pk_recuperacion}}" data-toggle="tooltip" data-placement="right" title="Ver más"><i class="fas fa-eye text-info"  ></i></a>
															</td>
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
							<div class="tab-pane fade @if($bandera) show active @endif" id="id{{$k}}" role="tabpanel" aria-labelledby="tab{{$k}}">
								<br>
								<div class="row">
									<div class="col-lg-3 col-lg-offset-3 center"></div>
									<div class="col-lg-6 col-lg-offset-6 center">
										<input type="text" id="search{{$k}}" value="" class="form-control" placeholder="Buscador">
									</div>
								</div>
								<br>
								<div class="table-responsive">
										<table class="table table-striped table-condensed table-sm  table-hover text-center">
											<thead>
												<tr>
													<th scope="col" style="color:#00695c" class="text-center"> Materia </th>
													<th scope="col" style="color:#00695c" class="text-center"> Estudiante </th>
													<th scope="col" style="color:#00695c" class="text-center"> Curso/Año </th>
													<th scope="col" style="color:#00695c" class="text-center"> Nota </th>
													<th scope="col" style="color:#00695c" class="text-center"> Acciones </th>
												</tr>
											</thead>
											<tbody id="search{{$k}}">	
												@if (count($nivelacion)==0)
													<tr>
														<td colspan="5" class="text-center"> No hay periodos perdidos </td>
													</tr>
												@else
													@foreach ($nivelacion as $n)
														<tr>	
															{{-- Materia --}}
															<td class="text-center"> {{$n->materia}} </td>
															{{-- Estudiante --}}
															<td class="text-center"> {{ucwords($n->apellido)}} {{ucwords($n->nombre)}}</td>
															{{-- Curso --}}
															<td class="text-center"> {{($n->prefijo==0)?"Preescolar":$n->prefijo}}-{{$n->sufijo}} / {{$n->ano}}</td>
															{{-- Nota --}}
															<td class="text-center"> {{$n->nota or "-"}}</td>
															{{-- Acciones --}}
															<td class="text-center">
																<a href="/nivelaciones/{{$n->pk_nivelacion}}" data-toggle="tooltip" data-placement="right" title="Ver más"><i class="fas fa-eye text-info"  ></i></a>
																<a href="/nivelaciones/{{$n->pk_nivelacion}}/editar" data-toggle="tooltip" data-placement="right" title="Editar"><i class="fas fa-edit text-info" ></i></a>
															</td>
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
<script>
	$( 'input[id^=search]' ).each(function(){
		$(this).on("keyup", function() {
			var value = $(this).val().toLowerCase();
			// alert(value);
			$("tbody[id="+$(this).attr("id")+"] tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
	
	$('[data-toggle="tooltip"]').tooltip(); 
</script>
@endsection
