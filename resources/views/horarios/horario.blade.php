<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/reset.css')}}"> <!-- CSS reset -->
<link rel="stylesheet" href="{{asset('css/style.css')}}"> <!-- Resource style -->

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
			{{-- {{dd($horarios)}} --}}
			@foreach ($horarios as $key => $item)
				<li class="eventpsp-group">
					<div class="top-infop"><span>{{ucwords($key)}}</span></div>
					<ul>
						@foreach ($item as $horario)
							<li class="single-eventp" data-start="{{explode(':', $horario->hora_inicio)[0]}}:{{explode(':', $horario->hora_inicio)[1]}}" data-end="{{explode(':', $horario->hora_fin)[0]}}:{{explode(':', $horario->hora_fin)[1]}}" data-content="eventp-abs-circuit" data-eventp="eventp-1">
								<a href="#0">
									<em class="eventp-name" style="font-size:1.5rem !important; text-align:center !important;">{{$horario->nombre}}</em>
								</a>
							</li>
						@endforeach
					</ul>
				</li>
			@endforeach
		</ul>
	</div>

	<div class="eventp-modal">
		<header class="headerp">
			<div class="content">
				<span class="eventp-date"></span>
				<h3 class="eventp-name"></h3>
			</div>

			<div class="headerp-bg"></div>
		</header>

		<div class="body-pepe">
			<div class="eventp-infop"></div>
			<div class="body-pepe-bg"></div>
		</div>

		<a href="#0" class="closep">close</a>
	</div>

	<div class="cover-layer"></div>
</div> <!-- .cd-schedule -->
<script src="{{asset('js/modernizr.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
{{-- <script>
	if( !window.jQuery ) document.write('<script src="{{asset('js/jquery-3.0.0.min.js')}}"><\/script>');
</script> --}}
<script src="{{asset('js/main.js')}}"></script> <!-- Resource jQuery -->
