<!-- Menu principal para el administrador -->
<nav class="cyan darken-3 nav-extended">
        <div class="nav-wrapper">
           <!--Espacio donde estara el logo de la pagina -->
           <a href="{{ url('/') }}" class="brand-logo"><img src="{{asset('css/img/logo_min_3.png')}}"></a>
            <!--Link que hace referencia al menu responsivo -->
            <a href="#" data-target="menu-responsivo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <!--Menu normal en modo grande -->
            <ul class="right hide-on-med-and-down">
                <li><a href="#!">Notas<i class="material-icons right">developer_board</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="cursos">&nbsp &nbsp Cursos &nbsp &nbsp<i class="material-icons right">class</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="empleados">Empleados<i class="material-icons right">group</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="estudiantes">Estudiantes<i class="material-icons right">child_care</i></a></li>
                <li><a href="{{ url('/') }}"><i class="material-icons">home</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="sesion"><i class="material-icons">account_circle</i></a></li>
            </ul>
            <!-- Estructura del despegable del logo de inicio de sesion -->
            <ul id="sesion" class="dropdown-content">
                <li><a href="#!"><i class="material-icons right">portrait</i></a></li>
                <li class="divider"></li>
                <li><a href="#!"><i class="material-icons right">exit_to_app</i></a></li>
            </ul>
            <!-- Estructura del despegable de Estudiantes -->
            <ul id="estudiantes" class="dropdown-content">
                <li><a href="#!">Crear<i class="material-icons right">person_add</i></a></li>
                <li class="divider"></li>
                <li><a href="#!">Editar<i class="material-icons right">build</i></a></li>
                <li class="divider"></li>
                <li><a href="#!">Eliminar<i class="material-icons right">delete</i></a></li>
            </ul>
            <!-- Estructura del despegable de Empleados -->
            <ul id="empleados" class="dropdown-content">
                <li><a href="#!">Crear<i class="material-icons right">person_add</i></a></li>
                <li class="divider"></li>
                <li><a href="#!">Editar<i class="material-icons right">build</i></a></li>
                <li class="divider"></li>
                <li><a href="#!">Eliminar<i class="material-icons right">delete</i></a></li>
            </ul>
            <!-- Estructura del despegable de Cursos -->
            <ul id="cursos" class="dropdown-content">
                <li><a href="#!">Crear<i class="material-icons right">create</i></a></li>
                <li class="divider"></li>
                <li><a href="#!">Editar<i class="material-icons right">build</i></a></li>
                <li class="divider"></li>
                <li><a href="#!">Eliminar<i class="material-icons right">delete</i></a></li>
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
