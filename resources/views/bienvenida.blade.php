@extends('contenedores.principal')
@section('titulo','Pagina Principal')
@section('contenedor_principal')
<br>
<br>
<!--Galeria por medio del materialize-->
{{-- <section> --}}
		<div class="fullscreen">
			<div class="slider">
					<ul class="slides">
					  <li>
						<img src="css/img/1.jpeg"> <!-- random image -->
						<div class="caption center-align">
						  <h3>Texto de prueba 1!</h3>
						  <h5 class="light grey-text text-lighten-3">Slogan 1.</h5>
						</div>
					  </li>
					  <li>
						<img src="css/img/2.jpeg"> <!-- random image -->
						<div class="caption left-align">
						  <h3>Texto de prueba 2!</h3>
						  <h5 class="light grey-text text-lighten-3">Slogan 1.</h5>
						</div>
					  </li>
					  <li>
						<img src="css/img/3.jpeg"> <!-- random image -->
						<div class="caption right-align">
						  <h3>Texto de prueba !</h3>
						  <h5 class="light grey-text text-lighten-3">Slogan 1.</h5>
						</div>
					  </li>
					  <li>
						<img src="css/img/4.jpeg"> <!-- random image -->
						<div class="caption center-align">
						  <h3>Texto de prueba !</h3>
						  <h5 class="light grey-text text-lighten-3">Slogan 1.</h5>
						</div>
					  </li>
					</ul>
			</div>
		</div>
			
	{{-- </section> --}}
@endsection
