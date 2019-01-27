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
            <br>
            <p class="text-muted">Somos una institución educativa ubicada en el casco urbano del municipio de Florián Santander que cuenta con 3 sedes que van desde el grado preescolar hasta undécimo grado en amplias y acogedoras instalaciones con mas de 40 años formando líderes ...</p>
            <a href="#footer" class="btn btn-success btn-pill align-self-center">Leer mas ...</a>
        </div>

        {{-- <div class="col-lg-4 col-md-5 col-sm-12 ml-auto">
            <img class="iphone-mockup ml-auto" src="img/app-promo/iphone-app-mockup.png" alt="iPhone App Mockup - Shards App Promo Demo">
        </div> --}}
        </div>
    </div>
    <!-- / Inner Wrapper -->
</div>
<!-- / Welcome Section -->
@endsection
