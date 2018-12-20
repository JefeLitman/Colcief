<!-- Menu principal para el estudiante -->
<link rel="stylesheet" href="{{ asset('css/style4.css') }}">
   
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header"  style="cursor: pointer;">
                <h3 style="color: white;"><i  style="color: Dodgerblue;" class="fab fa-contao"></i>olCief</h3>
                <strong style="color: Dodgerblue;" ><i class="fab fa-contao"></i></strong>
            </div>

            <ul class="list-unstyled components">
				<li @if (Request::path()=="empleados/principal/1") class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal/1') }}"> <i class="fas fa-home"></i> Inicio</a>
                </li>
                <li @if (Request::path()=="horarios") class="active" @endif >
					<a class="nav-link " href="{{ url('horarios') }}"> <i class="far fa-calendar-alt"></i> Mi Horario*</a>
                </li>
                <li @if (Request::path()=="horarios") class="active" @endif >
                    <a class="nav-link " href="{{ url('horarios') }}"> <i class="fas fa-chalkboard-teacher"></i> Mi Curso*</a>
                </li>
                <li @if (Request::path()=="") class="active" @endif >
					<a class="nav-link " href="{{ url('materiaspc') }}"> <i class="fas fa-book"></i> Mis Materias</a>
				</li>
                <li @if (Request::path()=="") class="active" @endif >
					<a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="fas fa-user-check"></i> Nivelacion*</a>
                </li>
                <li @if (Request::path()=="") class="active" @endif >
                    <a class="nav-link " href="{{ url('empleados/principal') }}"> <i class="fas fa-file"></i> Plantillas*</a>
                </li>
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
                                <a class="nav-link" href="{{ url('empleados/principal/1') }}">{{ucwords(session('user')['nombre'])}} {{ucwords(session('user')['apellido'])}} <i class="fas fa-user-circle"></i></a>
                    
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link active noti" style="cursor: pointer;" data-toggle="popover" data-placement="bottom" title="Notificaciones" data-content="No tienes notificaciones nuevas"><i class="fas fa-bell"></i> <span id="notificaciones" class="badge badge-pill badge-secondary">0</span> </a>
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
            }, 2000);
        });
    </script>