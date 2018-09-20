<!DOCTYPE html>
<html>
<head>
    {{--Este es la plantilla del inicio,Nuestro colegio, Ingresar y contactenos por lo tanto el menu sera
        el mismo para esas vistas--}}
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <!-- Menu principal para la pagina -->
    <nav class="green darken-4 nav-extended">
        <div class="nav-wrapper">
           <!--Espacio donde estara el logo de la pagina -->
            <a href="#" class="brand-logo">ColCief</a>
            <!--Link que hace referencia al menu responsivo -->
            <a href="#" data-target="menu-responsivo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <!--Menu normal en modo grande -->
            <ul class="right hide-on-med-and-down">
               <li><a href="{{ url('/Inicio') }}"><i class="material-icons right">home</i>Inicio</a></li>
               <li><a href="#"><i class="material-icons right">school</i>Nuestro Colegio</a></li>
               <li><a href="{{ url('/home') }}"><i class="material-icons right">local_phone</i>Cont&aacute;ctenos</a></li>
               <li><a href="{{ url('/home') }}"><i class="material-icons">account_circle</i></a></li>
            </ul>
        </div>
    </nav>
    </div>
    <!--Menu responsive en modo movil -->
    <ul class="sidenav" id="menu-responsivo">
    <li><a href="{{ url('/Inicio') }}"><i class="material-icons right">home</i>Inicio</a></li>
    <li><a href="#"><i class="material-icons right">school</i>Nuestro Colegio</a></li>
    <li><a href="#"><i class="material-icons right">local_phone</i>Cont&aacute;ctenos</a></li>
    <li><a href="{{ url('/home') }}"><i class="material-icons right">account_circle</i>Iniciar Sesi&oacute;n</a></li>
    </ul>
	<div class="container">
        @yield('contenedor_principal'){{--Aqui va el contenido de las vistas lo llama con extends y con section indica que aqui va el contenido de la vista--}}
	</div>
    <!-- Footer -->
    <footer class="page-footer green darken-4">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">Footer Content</h5>
                </div>
                <div class="col l4 offset-l2 s12">
                  <h5 class="white-text">Links</h5>
                  <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="footer-copyright">
              <div class="container">
              © 2018 JDWEP
              </div>
            </div>
    </footer>
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
