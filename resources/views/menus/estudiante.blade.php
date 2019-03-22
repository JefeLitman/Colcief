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
				<li @if (Request::path()=="estudiantes/".session('user')['pk_estudiante'])) class="active" @endif >
					<a class="nav-link " href="{{ url('estudiantes/principal') }}"> <i class="fas fa-home"></i> Inicio</a>
                </li>
                <li @if (Request::path()=="horarios") class="active" @endif >
					<a class="nav-link " href="{{ url('horarios') }}"> <i class="far fa-calendar-alt"></i> Horario</a>
                </li>
                <li @if (Request::path()=="matiaspc") class="active" @endif >
					<a class="nav-link " href="/materiaspc"> <i class="fas fa-sticky-note"></i> Notas</a>
				</li>
                <li @if (Request::path()=="nivelaciones") class="active" @endif >
					<a class="nav-link " href="/nivelaciones"> <i class="fas fa-user-check"></i> Nivelacion</a>
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
					<div class="sidebar-header" id="sidebarCollapse" style="cursor: pointer;">
						<h3><i class="fas fa-bars"></i></h3>
					</div>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('estudiantes/principal') }}">{{ucwords(session('user')['nombre'])}} {{ucwords(session('user')['apellido'])}} <i class="fas fa-user-circle"></i></a>
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

{{-- <nav class="navbar navbar-expand-lg navbar-dark  lead" style="background-color: #1e88e5; margin-bottom:25px;">   
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('css/img/logo_min_1.png')}}"  height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item @if (Request::path()=="estudiantes/principal") active @endif ">
                    <a class="nav-link " href="{{ url('estudiantes/principal') }}"> <i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="nav-item dropdown @if (Request::path()=="estudiantes/periodo") active @endif">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="fas fa-sticky-note"></i> Notas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('estudiantes/periodo/1') }}">Periodo 1</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('estudiantes/periodo/2') }}">Periodo 2</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('estudiantes/periodo/3') }}">Periodo 3</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('estudiantes/periodo/4') }}">Periodo 4</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}"> <i class="fas fa-sign-out-alt"></i> Salir </a>
                </li>
            </ul>
        </div>
</nav> --}}