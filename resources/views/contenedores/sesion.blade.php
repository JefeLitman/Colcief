<!-- Modelo de la pagina de sesiones -->
<!DOCTYPE html>
<html>
<head>
    <!-- Esta es la plantilla para el manejo de sesion en laravel -->
      <!--Import Google Icon Font-->
      <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"  media="screen,projection"/>
      <!-- Definiendo el titulo de la pagina -->
      <title>ColCIEF - @yield('titulo')</title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- En esta parte va el menu con la directiva includee para que quede en el lugar -->
    @include('menus.principal')

    <!-- Aqui en esta seccion va estar el contenido de la pagina -->
    @yield('content')

    <!-- En esta parte va el pie de pagina con la directiva include para que quede en el lugar -->
    @include('footers.principal')
    
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>