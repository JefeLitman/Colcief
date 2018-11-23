<!-- Menu principal para el administrador -->
<nav class="navbar navbar-expand-lg navbar-dark  lead" style="background-color: #1e88e5;">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('css/img/logo_min_1.png')}}"  height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @if (Request::path()=="empleados/principal") active @endif ">
                    <a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="fas fa-home"></i> Inicio</a>
                </li>
                {{-- Cursos --}}
                 <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chalkboard-teacher"></i> Cursos</a>
                    {{--  desplegable de cursos  --}}
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        {{--  Crear cursos  --}}
                        <a class="dropdown-item" href="{{ url('/cursos/crear') }}"><i class="fas fa-user-plus"></i> Crear</a>
                        <div class="dropdown-divider"></div>

                        {{--  Editar cursos  --}}
                        <a class="dropdown-item" href="{{ url('/cursos') }}"><i class="fas fa-user-edit"></i> Editar</a>
                    </div>
                </li>
                {{-- Empleados --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Empleados</a>
                        {{--  desplegable de empleados  --}}
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            {{--  crear empleados  --}}
                            <a class="dropdown-item" href="{{ url('/empleados/crear') }}"><i class="fas fa-user-plus"></i> Crear</a>
                            <div class="dropdown-divider"></div>

                            {{--  Editar empleados  --}}
                            <a class="dropdown-item" href="{{ url('/empleados') }}"><i class="fas fa-user-edit"></i> Editar</a>
                        </div>
                </li>

                 {{--  Estudiantes  --}}
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-graduate"></i> Estudiantes</a>
                    {{--  desplegable de estudiantes  --}}
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        {{--  Crear estudiantes  --}}
                        <a class="dropdown-item" href="{{ url('/estudiantes/crear') }}"><i class="fas fa-user-plus"></i> Crear</a>
                        <div class="dropdown-divider"></div>

                        {{--  Editar estudiantes  --}}
                        <a class="dropdown-item" href="{{ url('/estudiantes') }}"><i class="fas fa-user-edit"></i> Editar</a>
                    </div>
                </li>

                {{-- Divisiones --}}
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-th-list"></i> Divisones</a>
                    {{--  desplegable de divisones  --}}
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        {{--  Crear divisones  --}}
                        <a class="dropdown-item" href="{{ url('/divisiones/crear') }}"><i class="fas fa-plus-circle"></i> Crear</a>
                        <div class="dropdown-divider"></div>

                        {{--  Editar divisones  --}}
                        <a class="dropdown-item" href="{{ url('/divisiones') }}"><i class="fas fa-pen"></i> Editar</a>
                        <div class="dropdown-divider"></div>

                        {{--  Eliminar divisones  --}}
                        <a class="dropdown-item" href="#"><i class="fas fa-minus"></i> Eliminar</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}"> <i class="fas fa-sign-out-alt"></i> Salir </a>
                </li>
            </ul>
        </div>
</nav>
