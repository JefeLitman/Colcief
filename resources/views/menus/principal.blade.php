<nav class="navbar navbar-expand-lg navbar-dark pt-4 px-0">
    <a class="navbar-brand mr-5" href="#">
      <img src="img/app-promo/shards-logo-green.svg" class="mr-2" alt="Shards - Agency Landing Page">
      Colcief
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nuestro Colegio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contactenos</a>
        </li>
      </ul>

      <!-- Login -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            @if (empty(session('role')))
              <a class="nav-link" data-toggle="modal" data-target="#userModal">
                Login
              </a>
            @else
              <a class="nav-link" href="empleados/principal/{{ session('user')['role'] }}">
                {{ session('user')['nombre'] }}
              </a>
            @endif
          </li>
      </ul>
    </div>
  </nav>

  