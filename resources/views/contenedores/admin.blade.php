<!-- Modelo de la de hogar al iniciar sesion -->
<!DOCTYPE html>
<html>
<head>
    <!-- Esta es la plantilla para el manejo de sesion en laravel -->
    <!--Import Awesome Icon Font-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!--Import bootstrap.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/menus.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/precarga.css') }}"  media="screen,projection"/>
    <!-- Definiendo el titulo de la pagina -->
    <title>ColCIEF - @yield('titulo')</title>
    <!--Let browser know website is optimized for mobile-->
    <!--JavaScript at end of body forr optimized loading-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    {{-- Codificación --}}
    <meta charset="UTF-8">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
    <meta id="csrf_token" name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <!-- precarga  de la pagina -->
    @include('precarga.precarga')

    <!-- En esta parte va el menu con la directiva includee para que quede en el lugar -->
    {{-- @guest --}}
    @include('menus.admin')
    {{-- @endguest --}}
    <div id="br"></div>
    @include('error.error')
    @section('contenedor_admin')
    @show
   

</body>
</html>
