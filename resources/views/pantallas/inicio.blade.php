<!-- Modelo de la de hogar al iniciar sesion -->
<!DOCTYPE html>
<html>
<head>
    <!-- Esta es la plantilla para el manejo de sesion en laravel -->
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
      <!-- Definiendo el titulo de la pagina -->
      <title>ColCIEF - @yield('titulo')</title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <!-- En esta parte va el menu con la directiva includee para que quede en el lugar -->
    @auth
    @endauth
    @guest 
        @include('menus.principal')
    @endguest

    <!-- Aqui en esta seccion va estar el contenido de la pagina -->
    @yield('content')

    <!-- En esta parte va el pie de pagina con la directiva include para que quede en el lugar -->
    @auth
    @endauth
    @guest
        @include('footers.principal')
    @endguest
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.slider').slider();
        });
    </script>
</body>
</html>