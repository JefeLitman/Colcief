
<!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">

    <div class="wrapper" >
        <!-- Sidebar  -->
        <nav id="sidebar" class="active" >
            <div class="sidebar-header"  style="cursor: pointer;">
                <h3 style="color: white;"><i style="color: Dodgerblue;" class="fab fa-contao"></i>olCief</h3>
                <strong style="color: Dodgerblue;" ><i class="fab fa-contao"></i></strong>
            </div>

            <ul class="list-unstyled components">
                {{--  INICIO  --}}
				<li @if (Request::path()=="empleados/".session('user')['cedula']) class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="fas fa-home"></i> Inicio</a>
                </li>
                {{--  HORARIOS  --}}
				<li @if (Request::path()=="horarios") class="active" @endif >
					<a class="nav-link " href="{{ url('/horarios') }}"> <i class="far fa-calendar-alt"></i> Horarios</a>
                </li>
                {{--  CURSOS  --}}
				<li @if (Request::path()=="estudiantes") class="active" @endif >
					<a class="nav-link " href="{{ url('estudiantes') }}"> <i class="fas fa-chalkboard-teacher"></i> Cursos</a>
                </li>
                {{--  ESTUDIANTES  --}}
				<li @if (Request::path()=="filtro" or Request::path()=="/estudiantes/crear") class="active" @endif >
                    <!-- <a class="nav-link " href="{{ url('filtro') }}"> <i class="fas fa-user-graduate"></i> Estudiantes</a> -->
                    <a href="#estudianteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user-graduate"></i> Estudiantes
					</a>
					<ul class="collapse list-unstyled" id="estudianteSubmenu">
                        <li>
							<a href="{{ url('/filtro') }}"><i class="fas fa-eye"></i> Ver</a>
						</li>
						<li>
							<a href="{{ url('/estudiantes/crear') }}"><i class="fas fa-user-plus"></i> Crear</a>
						</li>
					</ul>
                </li>
                {{--  EMPLEADOS  --}}
				<li @if (Request::path()=="empleados" or Request::path()=="empleados/crear") class="active" @endif >
					<a href="#empleadoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="fas fa-users"></i> Empleados
					</a>
					<ul class="collapse list-unstyled" id="empleadoSubmenu">
                        <li>
							<a href="{{ url('/empleados') }}"><i class="fas fa-eye"></i> Ver</a>
						</li>
						<li>
							<a href="{{ url('/empleados/crear') }}"><i class="fas fa-user-plus"></i> Crear</a>
						</li>
					</ul>
                </li>
                {{--  COMPONENTES  --}}
                <li @if (Request::path()=="divisiones" or Request::path()=="divisiones/editar") class="active" @endif >
                    <a href="#divisionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-th-list"></i> Componentes
                    </a>
                    <ul class="collapse list-unstyled" id="divisionSubmenu">
                        <li>
                            <a href="{{ url('/divisiones') }}"><i class="fas fa-eye"></i> Ver</a>
                        </li>
                        <li>
                            <a href="{{ url('/divisiones/editar') }}"><i class="fas fa-pen-square"></i> Editar</a>
                        </li>
                    </ul>
					{{-- <a class="nav-link " href="{{ url('divisiones') }}"> <i class="fas fa-th-list"></i> </a> --}}
                </li>
                {{--  MATERIAS  --}}
				<li @if (Request::path()=="materiaspc") class="active" @endif >
					<a class="nav-link " href="/materiaspc"> <i class="fas fa-book"></i> Materias</a>
                </li>
                {{--  FECHAS  --}}
				<li @if (Request::path()=="fechas") class="active" @endif >
					<a class="nav-link " href="/fechas"> <i class="far fa-calendar-alt"></i> Fechas</a>
                </li>
                {{--  NIVELACIONES  --}}
				<li @if (Request::path()=="nivelaciones") class="active" @endif >
					<a class="nav-link " href="/nivelaciones"> <i class="fas fa-user-check"></i> Nivelaciones</a>
                </li>
                {{--  SIGSE  --}}
                <li @if (Request::path()=="SIGSE") class="active" @endif >
					<a class="nav-link " href="/SIGSE"> <i class="fas fa-chart-bar"></i> SIGSE</a>
                </li>
                {{--  DOCUMENTOS  --}}
                <li @if (Request::path()=="/archivos" or Request::path()=="/archivos/crear") class="active" @endif >
                    <a href="#archivoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="far fa-folder-open"></i> Documentos
                    </a>
                    <ul class="collapse list-unstyled" id="archivoSubmenu">
                        <li>
                            <a href="{{ url('/archivos/crear') }}"><i class="fas fa-cloud-upload-alt"></i>Subir</a>
                        </li>
                        <li>
                            <a href="{{ url('/archivos') }}"><i class="fas fa-eye"></i>Ver</a>
                        </li>
                    </ul>
                </li>
                {{--  SALIR  --}}
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/logout') }}"> <i class="fas fa-sign-out-alt"></i> Salir </a>
				</li>

            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-info d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('empleados/principal') }}">{{ucwords(session('user')['nombre'])}} {{ucwords(session('user')['apellido'])}} <i class="fas fa-user-circle"></i></a>
                            </li>
                            <li id="notification_li">
                                <a id="noo" title="<a title='Ver todas' href='{{ url('/notificaciones') }}'>Notificaciones</a>" class="nav-link" data-container="body" data-toggle="popover" data-placement="bottom" data-content="">
                                    <i class="fas fa-bell"></i> <span id="notificaciones" class="badge badge-pill badge-secondary"></span>
                                </a>
                            </li>
							<li class="nav-item active">
								<a class="nav-link" href="{{ url('/logout') }}"> <i class="fas fa-sign-out-alt"></i> Salir </a>
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
		$('.noti').popover().click(function () {
            setTimeout(function () {
                $('.noti').popover('hide');
            }, 5000);
        });
    </script>
    <script type="text/javascript" >
        $(document).ready(function(){
            $("#notificationLink").click(function(){
                $("#notificationContainer").fadeToggle(300);
                $("#notification_count").fadeOut("slow");
                return false;
            });
            //Document Click hiding the popup
            $(document).click(function(){
                $("#notificationContainer").hide();
            });
        });
    </script>
