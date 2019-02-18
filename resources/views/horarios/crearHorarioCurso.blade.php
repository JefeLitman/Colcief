@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo','Crear Horario') 

	<div class="container" style="background:#fafafa !important;">
		<h5 class="card-title text-center">
			Curso {{$curso->prefijo}}-{{$curso->sufijo}}
		</h5>
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('css/reset.css')}}"> 
		<link rel="stylesheet" href="{{asset('css/style.css')}}"> 

		<div class="cd-schedule loading">
			<div class="timeline">
				<ul>
					<li><span>07:00</span></li>
					<li><span>07:30</span></li>
					<li><span>08:00</span></li>
					<li><span>08:30</span></li>
					<li><span>09:00</span></li>
					<li><span>09:30</span></li>
					<li><span>10:00</span></li>
					<li><span>10:30</span></li>
					<li><span>11:00</span></li>
					<li><span>11:30</span></li>
					<li><span>12:00</span></li>
					<li><span>12:30</span></li>
					<li><span>13:00</span></li>
					<li><span>13:30</span></li>
					<li><span>14:00</span></li>
					<!-- <li><span>14:30</span></li>
					<li><span>15:00</span></li> -->
				</ul>
			</div>
			<div class="eventpsp">
				<ul>
					@foreach ($horarios as $key => $item)
						<li class="eventpsp-group">
							<div class="top-infop"><span>{{ucwords($key)}}</span></div>
							<ul id="{{$key}}">
								@foreach ($item as $ini => $horario)
									@if(!is_null($horario))
										<li pk="{{$horario['pk_horario']}}" materia="{{$horario['pk_materia_pc']}}" day="{{$key}}" class="single-eventp" data-start="{{explode(':', $horario['hora_inicio'])[0]}}:{{explode(':', $horario['hora_inicio'])[1]}}" data-end="{{explode(':', $horario['hora_fin'])[0]}}:{{explode(':', $horario['hora_fin'])[1]}}" data-content="eventp-abs-circuit" data-eventp="eventp-1">
											<a-pepe href="#0">
												<em class="eventp-name">{{$horario['nombre']}}</em>
											</a-pepe>
										</li>
									@else
										<li day="{{$key}}" class="single-eventp bg-light shadow-none border" style="z-index:1000;" data-start="{{$ini<10 ? '0'.$ini : $ini}}:00" data-end="{{$ini+1<10 ? '0'.($ini+1) : $ini+1}}:00" data-content="eventp-abs-circuit" data-eventp="eventp-1">
											<a-pepe href="#0">
												<em class="eventp-name mt-2" style="font-size:1 rem !important; text-align:center !important;"><i class="fas fa-plus-circle"></i> Agregar</em>
											</a-pepe>
										</li>
									@endif
								@endforeach
							</ul>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<form action="{{route('horarios.create')}}" method="POST" id="form">
						<input type="hidden" name="pk" id="pk">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Agregar horario</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="container" style="background:#fff !important;">
								<div class="row">
									<div class="col-12 col-sm-6 mb-3">
										<div class="form-group mb-2">
											<label for="dia"><strong><small style="color : #616161">Dia:</small></strong></label>
											<div class="input-group mb-2">
												<select name="dia" id="dia" class="custom-select">
													<option value="lunes">Lunes</option>
													<option value="martes">Martes</option>
													<option value="miercoles">Miercoles</option>
													<option value="jueves">Jueves</option>
													<option value="viernes">Viernes</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-6 mb-3">
										<div class="form-group mb-2">
											<label for="materia_pc"><strong><small style="color : #616161">Materia:</small></strong></label>
											<div class="input-group mb-2">
												<select name="materia_pc" id="materia_pc" required class="custom-select">
													<option value="" disabled selected>Seleccione</option>
													@foreach($materia_pc as $m)
														<option value="{{$m->pk_materia_pc}}">{{$m->nombre}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6 mb-3">
										<div class="form-group mb-2">
											<label for="inicio"><strong><small style="color : #616161">Inicio:</small></strong></label>
											<div class="input-group mb-2">
												<input type="time" id="inicio" name="inicio" class="form-control">
											</div>
										</div>
									</div>
									<div class="col-6 mb-3">
										<div class="form-group mb-2">
											<label for="fin"><strong><small style="color : #616161">Fin:</small></strong></label>
											<div class="input-group mb-2">
												<input type="time" id="fin" name="fin" class="form-control" value="08:00">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Guardar</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$('.single-eventp').click(function(){
					$('#materia_pc').val($(this).attr('materia') ? $(this).attr('materia') : null);
					$('#dia').val($(this).attr('day'));
					$('#inicio').val($(this).attr('data-start'));
					$('#fin').val($(this).attr('data-end'));
					$('#pk').val($(this).attr('pk') ? $(this).attr('pk') : null);
					$('#modal').modal('show');
				});
				$('#form').submit(function(event){
					event.preventDefault();
					$.ajax({
						type: 'POST',
						url: '/horarios',
						data: {
							_token:$('#csrf_token').attr('content'),
							curso: {{$curso->pk_curso}},
							hora_inicio:$('#inicio').val(),
							hora_fin:$('#fin').val(),
							fk_materia_pc:$('#materia_pc').val(),
							dia:$('#dia').val(),
							pk_horario: $('#pk').val(),
						},
						success: function(data) {
							location.reload();
						},
						error: function(){
							$('#modal').modal('show');
						}
					});
				})
			})
		</script>
		<script src="{{asset('js/modernizr.js')}}"></script>
		<script src="{{asset('js/main.js')}}"></script>
	</div>

@endsection