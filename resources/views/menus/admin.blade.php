
<!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
   
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header"  style="cursor: pointer;">
                <h3 style="color: white;"><i style="color: Dodgerblue;" class="fab fa-contao"></i>olCief</h3>
                <strong style="color: Dodgerblue;" ><i class="fab fa-contao"></i></strong>
            </div>

            <ul class="list-unstyled components">
				<li @if (Request::path()=="empleados/principal") class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="fas fa-home"></i> Inicio</a>
				</li>
				<li @if (Request::path()=="") class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="far fa-calendar-alt"></i> Horarios*</a>
				</li>
				<li @if (Request::path()=="") class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="fas fa-chalkboard-teacher"></i> Cursos*</a>
				</li>
				<li @if (Request::path()=="") class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="fas fa-user-graduate"></i> Estudiantes*</a>
				</li>
				<li @if (Request::path()=="empleados") class="active" @endif >
					<a href="#empleadoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="fas fa-users"></i> Empleados
					</a>
					<ul class="collapse list-unstyled" id="empleadoSubmenu">
						<li>
							<a href="{{ url('/empleados/crear') }}"><i class="fas fa-user-plus"></i> Crear</a>
						</li>
						<li>
							<a href="{{ url('/empleados') }}"><i class="fas fa-user-edit"></i> Editar</a>
						</li>
					</ul>
				</li>
				<li @if (Request::path()=="divisiones") class="active" @endif >
					<a class="nav-link " href="{{ url('divisiones') }}"> <i class="fas fa-th-list"></i> Componentes</a>
				</li>
				<li @if (Request::path()=="") class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="fas fa-file"></i> Plantillas*</a>
				</li>
				<li @if (Request::path()=="") class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="fas fa-book"></i> Materias*</a>
				</li>
				<li @if (Request::path()=="") class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="far fa-calendar-alt"></i> Fechas*</a>
				</li>
				<li @if (Request::path()=="") class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="fas fa-file-contract"></i> Boletines*</a>
				</li>
				<li @if (Request::path()=="") class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="fas fa-user-check"></i> Nivelaciones*</a>
				</li>
				{{-- <li @if (Request::path()=="cursos") class="active" @endif>
					<a href="#cursosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="fas fa-chalkboard-teacher"></i> Cursos
					</a>
					<ul class="collapse list-unstyled" id="cursosSubmenu">
						<li>
							<a href="{{ url('/cursos/crear') }}"><i class="fas fa-user-plus"></i> Crear</a>
						</li>
						<li>
							<a href="{{ url('/cursos') }}"><i class="fas fa-user-edit"></i> Editar</a>
						</li>
					</ul>
				</li>
				<li @if (Request::path()=="empleados") class="active" @endif >
					<a href="#empleadoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="fas fa-users"></i> Empleados
					</a>
					<ul class="collapse list-unstyled" id="empleadoSubmenu">
						<li>
							<a href="{{ url('/empleados/crear') }}"><i class="fas fa-user-plus"></i> Crear</a>
						</li>
						<li>
							<a href="{{ url('/empleados') }}"><i class="fas fa-user-edit"></i> Editar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#estudianteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="fas fa-user-graduate"></i> Estudiantes
					</a>
					<ul class="collapse list-unstyled" id="estudianteSubmenu">
						<li>
							<a href="{{ url('/estudiantes/crear') }}"><i class="fas fa-user-plus"></i> Crear</a>
						</li>
						<li>
							<a href="{{ url('/estudiantes') }}"><i class="fas fa-user-edit"></i> Editar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#divisionesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="fas fa-th-list"></i> Divisones
					</a>
					<ul class="collapse list-unstyled" id="divisionesSubmenu">
						<li>
							<a href="{{ url('/divisiones/crear') }}"><i class="fas fa-plus-circle"></i> Crear</a>
						</li>
						<li>
							<a href="{{ url('/divisiones') }}"><i class="fas fa-pen"></i> Editar</a>
						</li>
						<li>
							<a  href="#"><i class="fas fa-minus"></i> Eliminar</a>
						</li>
					</ul>
				</li> --}}
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/logout') }}"> <i class="fas fa-sign-out-alt"></i> Salir </a>
				</li>
                
            </ul>
        </nav>
	
        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
					<div class="sidebar-header" id="sidebarCollapse" style="cursor: pointer;">
						<h3><i class="fas fa-bars"></i></h3>
					</div>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('empleados/principal') }}">{{ucwords(session('user')['nombre'])}} {{ucwords(session('user')['apellido'])}} <i class="fas fa-user-circle"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
			</nav>
    

    
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
 
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>