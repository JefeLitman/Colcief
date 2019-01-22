<!-- Footer Section -->
<footer>
    <nav class="navbar navbar-dark bg-dark fixed-bottom" style="padding: .0rem .7rem!important;background-color: rgba(0, 0, 0, 0.5)!important;cursor:pointer" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
        <a data-scroll class="navbar-brand float-right" href="#" style="font-size:.8rem">ColCIEF</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="font-size:.3rem;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="font-size:.8rem">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a data-scroll class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a data-scroll class="nav-link" href="#nuestro-colegio">Nuestro Colegio</a>
                </li>
                <li class="nav-item">
                    <a data-scroll class="nav-link" href="#contacto">Contactenos</a>
                </li>
            </ul>
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
                        <a class="nav-link" href="empleados/principal/{{ session('user')['role'] }}">
                        {{ session('user')['nombre'] }}
                        </a>
                    @endif
                    @endif
                </li>
                </ul>
            @endif
        </div>
    </nav>
</footer>
<!-- / Footer Section -->