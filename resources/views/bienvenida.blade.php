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
						<img src="css/img/13.jpg">  
					</li>
					<li>
						<img src="css/img/2.jpeg">  
					</li>
					<li>
						<img src="css/img/3.jpeg">  
					</li>
					<li>
						<img src="css/img/4.jpeg">  
					</li>
					<li>
						<img src="css/img/5.jpeg">
					</li>
					<li>
						<img src="css/img/6.jpeg">  
					</li>
					</ul>
			</div>
		</div>
			
	{{-- </section> --}}
@endsection
