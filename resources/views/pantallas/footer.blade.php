<style>
    .link{
        color: inherit;
        text-decoration: none;
    }
    .link:hover{
        color: inherit;
        text-decoration: none;
    }
</style>
<!-- Footer Section -->
{{--  <footer>
    <nav class="navbar navbar-dark bg-dark" style="padding: .0rem .7rem!important;cursor:pointer" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
        <a data-scroll class="navbar-brand float-right a-footer" href="#" style="font-size:.8rem">ColCIEF</a>
        <a class="a-footer" target="_blank" href="https://www.facebook.com/COLEGIO-INTEGRADO-EZEQUIEL-FLORIAN-130222610330580/"><i class="fas fa-facebook" style="color:#fff"></i></a>
        <div class="collapse navbar-collapse" id="navbarNav" style="font-size:.8rem">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a data-scroll class="nav-link a-footer" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a data-scroll class="nav-link a-footer" href="#nuestro-colegio">Nuestro Colegio</a>
                </li>
                <li class="nav-item">
                    <a data-scroll class="nav-link a-footer" href="#contacto">Contactenos</a>
                </li>
            </ul>
            @if (Request::path()=="/")
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @if (empty(session('role')))
                    <a class="nav-link a-footer" data-toggle="modal" data-target="#userModal">
                        Login
                    </a>
                    @else
                    @if (session('role') == 'estudiante')
                        <a class="nav-link a-footer" href="estudiantes/principal">
                        {{ session('user')['nombre'] }}
                        </a>
                    @else
                        <a class="nav-link a-footer" href="empleados/principal/{{ session('user')['role'] }}">
                        {{ session('user')['nombre'] }}
                        </a>
                    @endif
                    @endif
                </li>
                </ul>
            @endif
        </div>
    </nav>
</footer> --}}
<!-- / Footer Section -->
<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4 bg-dark" id="footer">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-8 mx-auto">

                <!-- Content -->
                <h5 class="font-weight-bold mt-3 mb-4 text-white">ColCIEF</h5>
                <p>Somos una institución educativa ubicada en el casco urbano del municipio de Florián Santander que cuenta con 3 sedes que van desde el grado kinder hasta undécimo grado en amplias y acogedoras instalaciones con mas de 40 años formando líderes a la sociedad. En la actualidad sus bachilleres reciben el título de Técnicos en Liderazgo Socioambiental y gracias a la vinculación del SENA también reciben el título de Técnicos en Producción de Café Orgánico. De este modo nuestros egresados son mas competitivos tanto en el mundo laboral como en la educación superior.</p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 mx-auto">
                <h5 class="font-weight-bold mt-3 mb-4 text-white">Navega</h5>

                <!-- Links -->
                <ul class="list-unstyled">
                    <li>
                        <a class="link" href="#">Inicio</a>
                    </li>
                    <li>
                        <a class="link" href="#nuestro-colegio">Nuestro Colegio</a>
                    </li>
                    <li>
                        <a class="link" href="#contacto">Contactenos</a>
                    </li>
                    <li>
                        @if (Request::path()=="/")
                            @if (empty(session('role')))
                                <a class="link" data-toggle="modal" data-target="#userModal">
                                Login
                                </a>
                            @else
                                @if (session('role') == 'estudiante')
                                <a class="link" href="estudiantes/principal">
                                    {{ session('user')['nombre'] }}
                                </a>
                                @else
                                <a class="link" href="empleados/principal/{{ session('user')['role'] }}">
                                    {{ session('user')['nombre'] }}
                                </a>
                                @endif
                            @endif
                            </li>
                        </ul>
                        @endif
                    </li>
                </ul>
            </div>

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <hr>

    <!-- Social buttons -->
    <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
            <a class="link" target ="blank" href="https://www.facebook.com/COLEGIO-INTEGRADO-EZEQUIEL-FLORIAN-130222610330580/" class="btn-floating btn-fb mx-1">
                <i class="fab fa-facebook-f"> </i>
            </a>
        </li>
        {{-- <li class="list-inline-item">
            <a class="btn-floating btn-tw mx-1">
                <i class="fas fa-twitter"> </i>
            </a>
        </li> --}}
        <li class="list-inline-item">
            <a class="link" target ="blank" href="https://sites.google.com/site/colcief/" class="btn-floating btn-gplus mx-1">
                <i class="fas fa-blog"></i>
            </a>
        </li>
        {{-- <li class="list-inline-item">
            <a class="btn-floating btn-li mx-1">
                <i class="fas fa-linkedin-in"> </i>
            </a>
        </li>
        <li class="list-inline-item">
            <a class="btn-floating btn-dribbble mx-1">
                <i class="fas fa-dribbble"> </i>
            </a>
        </li> --}}
    </ul>
    <!-- Social buttons -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3"><i class="fas fa-copyright"></i> 2019 Copyright:
        <a class="link" href=""> JDWEP</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->