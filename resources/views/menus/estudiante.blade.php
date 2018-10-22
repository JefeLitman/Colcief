<!-- Menu principal para el estudiante -->

<nav class="navbar navbar-expand-lg navbar-dark  lead" style="background-color: #1e88e5; height:50px;">   
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="fas fa-sticky-note"></i> Notas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Periodo 1</a>
                        <a class="dropdown-item" href="#">Periodo 2</a>
                        <a class="dropdown-item" href="#">Periodo 3</a>
                        <a class="dropdown-item" href="#">Periodo 4</a>
                    </div>
                </li>
                <li class="nav-item @if (Request::path()=="login") active @endif ">
                    <a class="nav-link" href="{{ url('/logout') }}"> <i class="fas fa-sign-out-alt"></i> Salir </a>
                </li>
            </ul>
        </div>
</nav>