<!-- Menu principal para la pagina -->
<nav class="cyan darken-3 nav-extended">
        <div class="nav-wrapper">
           <!--Espacio donde estara el logo de la pagina -->
            <a href="{{ url('/') }}" class="brand-logo"><img src="{{asset('css/img/logo_min_1.png')}}"></a>
            <!--Link que hace referencia al menu responsivo -->
            <a href="#" data-target="menu-responsivo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <!--Menu normal en modo grande -->
            <ul class="right hide-on-med-and-down">
               <li><a href="{{ url('/') }}"><i class="material-icons right">home</i>Inicio</a></li>
               <li><a href="{{ url('/nosotros') }}"><i class="material-icons right">school</i>Nuestro Colegio</a></li>
               <li><a href="{{ url('/contacto') }}"><i class="material-icons right">local_phone</i>Cont&aacute;ctenos</a></li>
               <li><a href="{{ url('/login') }}"><i class="material-icons">account_circle</i></a></li>
            </ul>
        </div>
    </nav>
    <!--Menu responsive en modo movil -->
    <ul class="sidenav" id="menu-responsivo">
    <li><a href="{{ url('/') }}"><i class="material-icons right">home</i>Inicio</a></li>
    <li><a href="#"><i class="material-icons right">school</i>Nuestro Colegio</a></li>
    <li><a href="#"><i class="material-icons right">local_phone</i>Cont&aacute;ctenos</a></li>
    <li><a href="{{ route('login') }}"><i class="material-icons right">account_circle</i>Iniciar Sesi&oacute;n</a></li>
    </ul>
    