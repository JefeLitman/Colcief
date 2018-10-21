<!-- Menu principal para el administrador -->
<nav class="navbar navbar-expand-lg navbar-light lead" style="background-color: #1e88e5;">
    <!--Espacio donde estara el logo de la pagina -->
    <a href="{{ url('/') }}" class="brand-logo"><img src="{{asset('css/img/logo_min_1.png')}}"></a>

    {{--  boton de menu para el responsive  --}}
    <button style="color: #ffffff;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon " style=" color: #ffffff; !import"></span></button>

        {{--  menu  --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div>
                <!--Menu normal en modo grande -->
                <ul class="nav navbar-nav mr-auto">{{-- id="menu" --}}
                    {{--  Notas  --}}
                    <li class="nav-item">
                    <a class="nav-link navi2" class="navi2" href="#" style="color: #ffffff;">&nbsp &nbsp Notas &nbsp &nbsp<span class="sr-only">(current)</span><i class="material-icons right">developer_board</i></a></li>

                    {{--  Cursos  --}}
                    <li class="nav-item"><a class="nav-link navi2" href="#!" style="color: #ffffff;">&nbsp &nbsp Cursos &nbsp &nbsp<i class="material-icons right">class</i></a></li>

                    {{--  empleados  --}}
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle navi2" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;">&nbsp &nbsp Empleados &nbsp &nbsp<i class="material-icons right">group</i></a>

                        {{--  desplegable de empleados  --}}
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            {{--  crear empleados  --}}
                            <a class="dropdown-item" href="{{ url('/empleados/crear') }}">&nbsp &nbsp Crear &nbsp &nbsp<i class="material-icons right">person_add</i></a>
                            <div class="dropdown-divider"></div>

                            {{--  Editar empleados  --}}
                            <a class="dropdown-item"
                            href="{{ url('/empleados') }}">&nbsp &nbsp Editar &nbsp &nbsp<i class="material-icons right">build</i></a>
                            <div class="dropdown-divider"></div>

                            {{--  Eliminar empleados  --}}
                            <a class="dropdown-item" href="#!">&nbsp &nbsp Eliminar &nbsp &nbsp<i class="material-icons right">delete</i></a>
                        </div>
                    </li>
                    {{--  Estudiantes  --}}
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle navi2" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;">&nbsp &nbsp Estudiantes &nbsp &nbsp<i class="material-icons right">child_care</i></a>

                        {{--  desplegable de estudiantes  --}}
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            {{--  Crear estdiantes  --}}
                            <a class="dropdown-item" href="{{ url('/estudiantes/crear') }}">&nbsp &nbsp Crear &nbsp &nbsp<i class="material-icons right">person_add</i></a>
                            <div class="dropdown-divider"></div>

                            {{--  Editar empleados  --}}
                            <a class="dropdown-item" href="{{ url('/estudiantes') }}">&nbsp &nbsp Editar &nbsp &nbsp<i class="material-icons right">build</i></a>
                            <div class="dropdown-divider"></div>

                            {{--  Eliminar empleados  --}}
                            <a class="dropdown-item" href="#!">&nbsp &nbsp Eliminar &nbsp &nbsp<i class="material-icons right">delete</i></a>
                        </div>
                    </li>
                    {{--  Salir  --}}
                    <li class="nav-item"><a  class="nav-link navi2" href="{{ url('/logout') }}" style="color: #ffffff;">&nbsp &nbsp Salir &nbsp &nbsp<i class="material-icons right">exit_to_app</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
