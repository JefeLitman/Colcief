<nav class="navbar navbar-expand-lg navbar-dark pt-4 px-0" id="inicio">
    <a class="navbar-brand mr-5" href="#">
      <img src="{{asset('img/app-promo/shards-logo-green.svg')}}" class="mr-2" alt="Shards - Agency Landing Page">
      ColCIEF
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a data-scroll class="nav-link" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a data-scroll class="nav-link" href="#nosotros">Acerca de Nosotros</a>
        </li>
        <!-- <li class="nav-item">
          <a data-scroll class="nav-link" href="#nuestro-colegio">Nuestro Colegio</a>
        </li> -->
        <li class="nav-item">
            <a data-scroll class="nav-link" href="#historia">Historia</a>
        </li>
        <li class="nav-item">
          <a data-scroll class="nav-link" href="#contacto">Contactenos</a>
        </li>
      </ul>

      <!-- Login -->
      @if (Request::path()=="/")
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            @if (empty(session('role')))
              <a class="nav-link" data-toggle="modal" data-target="#userModal">
                Login
              </a>
            @else
              @if (session('role') == 'estudiante')
                <a class="nav-link" href="estudiantes/principal">
                  {{ session('user')['nombre'] }}
                </a>
              @else
                <a class="nav-link" href="empleados/principal">
                  {{ session('user')['nombre'] }}
                </a>
              @endif
            @endif
          </li>
        </ul>
      @endif
    </div>
  </nav>

