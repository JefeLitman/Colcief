@extends('pantallas.inicio')
@section('titulo','Inicio')
@section('contenedor_login')
<!-- Welcome Section -->
<div class="welcome d-flex justify-content-center flex-column">
    <div class="container">
        <!-- Navigation -->
        @include('menus.principal')
        <!-- / Navigation -->
    </div> <!-- .container -->

    <!-- Inner Wrapper -->
    <div class="inner-wrapper mt-auto mb-auto container">

        <div class="row">
        <div class="col-lg-6 col-md-5 col-sm-12 mt-auto mb-auto mr-3">
            <h2 class="welcome-heading text-white">¿Quienes somos?</h2>
            <p class="text-muted">El colegio fue creado en 1970 por el secretario de Educación del departamento bajo la denominación de colegio “Eduardo Camacho Gamba”, en honor al ilustre político. Inicio sus laborares con un total de 31 estudiantes matriculados en el curso de bachillerato y fue nombrado como rector el docente Baltasar Santoyo Alza...</p>
            <a href="#" class="btn btn-success btn-pill align-self-center">Ver mas ...</a>
        </div>

        <div class="col-lg-4 col-md-5 col-sm-12 ml-auto">
            <img class="iphone-mockup ml-auto" src="img/app-promo/iphone-app-mockup.png" alt="iPhone App Mockup - Shards App Promo Demo">
        </div>
        </div>
    </div>
    <!-- / Inner Wrapper -->
</div>
<!-- / Welcome Section -->
@endsection
