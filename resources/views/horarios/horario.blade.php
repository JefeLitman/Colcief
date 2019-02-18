@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo',' Horario') 

	<div class="container mb-5" style="background:#fafafa !important;">
		<h5 class="card-title text-center">
			{{$titulo}}
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
				</ul>
			</div> <!-- .timeline -->

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
										<li day="{{$key}}" class=" mb-3 single-eventp bg-light shadow-none border" style="z-index:1000;" data-start="{{$ini<10 ? '0'.$ini : $ini}}:00" data-end="{{$ini+1<10 ? '0'.($ini+1) : $ini+1}}:00" data-content="eventp-abs-circuit" data-eventp="eventp-1">
											<a-pepe href="#0">
												<em class="eventp-name mt-2" style="font-size:1 rem !important; text-align:center !important;"></em>
											</a-pepe>
										</li>
									@endif
								@endforeach
							</ul>
						</li>
					@endforeach
				</ul>
			</div>
		</div
		<script src="{{asset('js/modernizr.js')}}"></script>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> -->
		<script src="{{asset('js/main.js')}}"></script> <!-- Resource jQuery -->
	</div>

@endsection
