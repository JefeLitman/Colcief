<!-- Menu principal para el administrador -->
<nav class="green darken-4 nav-extended">
        <div class="nav-wrapper">
           <!--Espacio donde estara el logo de la pagina -->
           <a href="#" class="brand-logo"><img src="../css/img/logo_min_3.png"></a>
            <!--Link que hace referencia al menu responsivo -->
            <a href="#" data-target="menu-responsivo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <!--Menu normal en modo grande -->
            <ul class="right hide-on-med-and-down">

               <li><a href="{{ url('/estudiantes') }}"><i class="material-icons right">build</i>Estudiantes</a></li>
               <li><a href="{{ url('/empleados') }}"><i class="material-icons right">build</i>Empleados</a></li>
               <li><a href="{{ url('/') }}"><i class="material-icons right">home</i></a></li>
               <li><a href="{{ url('/home') }}"><i class="material-icons">account_circle</i></a></li>
            </ul>
        </div>
    </nav>
    <!--Menu responsive en modo movil -->
    <ul class="sidenav" id="menu-responsivo">
    <li><a href="{{ url('/estudiantes') }}"><i class="material-icons right">build</i>Estudiantes</a></li>
    <li><a href="{{ url('/empleados') }}"><i class="material-icons right">build</i>Empleados</a></li>
    <li><a href="{{ url('/') }}"><i class="material-icons right">home</i>Inicio</a></li>
    <li><a href="{{ url('/home') }}"><i class="material-icons right">account_circle</i>Iniciar Sesi&oacute;n</a></li>
    </ul>
