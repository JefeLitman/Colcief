<!-- Modelo de la de hogar al iniciar sesion -->
<!DOCTYPE html>
<html>
<head>
    <!-- Esta es la plantilla para el manejo de sesion en laravel -->
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"  media="screen,projection"/>
      <!--precarga-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/preload.css') }}"/>
      <!-- Definiendo el titulo de la pagina -->
      <title>ColCIEF - @yield('titulo')</title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
        <!-- Precarga-->
        <div class="preloader-background" id="preloader-background">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>
            </div>
        </div>
    <!-- En esta parte va el menu con la directiva includee para que quede en el lugar -->
    @guest
        @include('menus.admin')
    @endguest
    {{-- @guest
        @include('menus.principal')
    @endguest --}}
    <!-- Aqui en esta seccion va estar el contenido de la pagina -->
    <main>
	    <div class="container">
            @yield('contenedor_principal')
            {{-- @show --}}
        </div>
    </main>

    <!-- En esta parte va el pie de pagina con la directiva includee para que quede en el lugar -->
    @auth
        @include('footers.admin')
    @endauth
    @guest
        @include('footers.principal')
    @endguest
    <!--JavaScript at end of body forr optimized loading-->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
