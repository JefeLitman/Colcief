<!-- Menu principal para el estudiante -->
<nav class="cyan darken-3 nav-extended">
        <div class="nav-wrapper">
           <!--Espacio donde estara el logo de la pagina -->
           <a href="{{ url('/') }}" class="brand-logo"><img src="{{asset('css/img/logo_min_1.png')}}"></a>
            <!--Link que hace referencia al menu responsivo -->
            <a href="#" data-target="menu-responsivo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <!--Menu normal en modo grande -->
            <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-trigger" href="#!" data-target="notas">&nbsp &nbsp Notas &nbsp &nbsp<i class="material-icons right">developer_board</i></a></li>
            <li><a class="dropdown-trigger" href="{{ url('/estudiantes/'.session('user')['pk_estudiante'].'/editar') }}">Perfil<i class="material-icons right">build</i></a></li>
            <li><a class="dropdown-trigger" href="{{ url('/logout') }}" >Salir<i class="material-icons right">exit_to_app</i></a></li>
            </ul>
           
            <!-- Estructura del despegable de Notas -->
            <ul id="notas" class="dropdown-content">
                <li><a href="#!">Periodo<i class="material-icons right">filter_1</i></a></li>
                <li class="divider"></li>
                <li><a href="#!">Periodo<i class="material-icons right">filter_2</i></a></li>
                <li class="divider"></li>
                <li><a href="#!">Periodo<i class="material-icons right">filter_3</i></a></li>
                <li class="divider"></li>
                <li><a href="#!">Periodo<i class="material-icons right">filter_4</i></a></li>
            </ul>
        </div>
    </nav>
    <!--Menu responsive en modo movil -->
    <ul class="sidenav" id="menu-responsivo">
    <li><a href="#!"><i class="material-icons right">developer_board</i>Notas</a></li>
    <li><a href="#!"><i class="material-icons right">class</i>Cursos</a></li>
    <li><a href="{{ url('/empleadoss') }}"><i class="material-icons right">group</i>Empleados</a></li>
    <li><a href="{{ url('/estudiantes') }}"><i class="material-icons right">child_care</i>Estudiantes</a></li>
    <li><a href="{{ url('/') }}"><i class="material-icons right">home</i>Inicio</a></li>
    <li><a href="{{ url('/home') }}"><i class="material-icons right">account_circle</i>Iniciar Sesi&oacute;n</a></li>
    </ul>