<!-- Contenedor de la pagina principal -->
<!DOCTYPE html>
<html>
<head>
    {{--Este es la plantilla del inicio,Nuestro colegio, Ingresar y contactenos por lo tanto el menu sera
        el mismo para esas vistas--}}
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
    <!-- En esta parte va el menu con la directiva include para que quede en el lugar -->
    @include('menus.principal')
	<div class="container">
        @section('contenedor_principal')
        @show
	</div>
    <!-- En esta parte va el pie de pagina con la directiva include para que quede en el lugar -->
    @include('footers.principal')
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
