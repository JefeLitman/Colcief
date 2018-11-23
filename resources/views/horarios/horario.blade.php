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

	<div class="events">
		<ul>
			@foreach ($horarios as $key => $item)
				<li class="events-group">
					<div class="top-info"><span>{{ucwords($key)}}</span></div>
					<ul>
						@foreach ($item as $horario)
							<li class="single-event" data-start="{{explode(':', $horario->hora_inicio)[0]}}:{{explode(':', $horario->hora_inicio)[1]}}" data-end="{{explode(':', $horario->hora_fin)[0]}}:{{explode(':', $horario->hora_fin)[1]}}" data-content="event-abs-circuit" data-event="event-1">
								<a href="#0">
									<em class="event-name">{{$horario->nombre}}</em>
								</a>
							</li>
						@endforeach
					</ul>
				</li>
			@endforeach
		</ul>
	</div>

	<div class="event-modal">
		<header class="header">
			<div class="content">
				<span class="event-date"></span>
				<h3 class="event-name"></h3>
			</div>

			<div class="header-bg"></div>
		</header>

		<div class="body">
			<div class="event-info"></div>
			<div class="body-bg"></div>
		</div>

		<a href="#0" class="close">Close</a>
	</div>

	<div class="cover-layer"></div>
</div> <!-- .cd-schedule -->
<script src="{{asset('js/modernizr.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
{{-- <script>
	if( !window.jQuery ) document.write('<script src="{{asset('js/jquery-3.0.0.min.js')}}"><\/script>');
</script> --}}
<script src="{{asset('js/main.js')}}"></script> <!-- Resource jQuery -->