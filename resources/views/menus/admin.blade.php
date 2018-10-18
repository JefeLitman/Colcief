<!-- Menu principal para el administrador -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1e88e5;">
    <!--Espacio donde estara el logo de la pagina -->
    <a href="{{ url('/') }}" class="brand-logo"><img src="{{asset('css/img/logo_min_1.png')}}"></a>
    {{--  boton de menu para el responsive  --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        {{--  menu  --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{--  <!--Link que hace referencia al menu responsivo -->
            <a href="#" data-target="menu-responsivo" class="sidenav-trigger"><i class="material-icons">menu</i></a>  --}}
            <!--Menu normal en modo grande -->
            <ul class="nav navbar-nav navbar-right mr-auto"> {{-- id="menu" --}}
                {{--  Notas  --}}
                <li class="nav-item"><a class="nav-link" href="#" style="color: #ffffff;">&nbsp &nbsp Notas &nbsp &nbsp<span class="sr-only">(current)</span><i class="material-icons right">developer_board</i></a></li>
                {{--  Cursos  --}}
                <li class="nav-item"><a class="nav-link" href="#!" style="color: #ffffff;">&nbsp &nbsp Cursos &nbsp &nbsp<i class="material-icons right">class</i></a></li>
                {{--  empleados  --}}
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;">&nbsp &nbsp Empleados &nbsp &nbsp<i class="material-icons right">group</i></a></li>
                    {{--  desplegable de empleados  --}}
                    <div class="dropdown-menu">
                        {{--  crear empleados  --}}
                        <a class="dropdown-item" href="{{ url('/empleados/crear') }}">&nbsp &nbsp Crear &nbsp &nbsp<i class="material-icons right">person_add</i></a></li>
                        {{--  Editar empleados  --}}
                        <a class="dropdown-item"
                        href="{{ url('/empleados') }}">Editar<i class="material-icons right">build</i></a></li>
                        {{--  Eliminar empleados  --}}
                        <a href="#!">Eliminar<i class="material-icons right">delete</i></a></li>
                    </div>
                {{--  Estudiantes  --}}
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;">&nbsp &nbsp Estudiantes &nbsp &nbsp<i class="material-icons right">child_care</i></a></li>
                    {{--  desplegable de estudiantes  --}}
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{--  Crear estdiantes  --}}
                        <a href="{{ url('/estudiantes/crear') }}">Crear<i class="material-icons right">person_add</i></a>
                        {{--  Editar empleados  --}}
                        <a href="{{ url('/estudiantes') }}">Editar<i class="material-icons right">build</i></a>
                        {{--  Eliminar empleados  --}}
                        <a href="#!">Eliminar<i class="material-icons right">delete</i></a>
                    </div>
                {{--  Salir  --}}
                <li class="nav-item"><a  class="nav-link" href="{{ url('/logout') }}" style="color: #ffffff;">&nbsp &nbsp Salir &nbsp &nbsp<i class="material-icons right">exit_to_app</i></a></li>
            </ul>
        </div>
    </nav>
