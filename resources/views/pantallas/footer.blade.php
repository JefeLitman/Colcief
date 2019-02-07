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
                <p>Somos una institución educativa ubicada en el casco urbano del municipio de Florián Santander que cuenta con 3 sedes que van desde el grado preescolar hasta undécimo grado en amplias y acogedoras instalaciones con mas de 40 años formando líderes a la sociedad. En la actualidad sus bachilleres reciben el título de Técnicos en Liderazgo Socioambiental y gracias a la vinculación del SENA también reciben el título de Técnicos en Producción. De este modo nuestros egresados son mas competitivos tanto en el mundo laboral como en la educación superior.</p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 mx-auto">
                <h5 class="font-weight-bold mt-3 mb-4 text-white">Navega</h5>

                <!-- Links -->
                <ul class="list-unstyled">
                    <li>
                        <a data-scroll class="link" href="#">Inicio</a>
                    </li>
                    <li>
                        <a data-scroll class="link" href="#nosotros">Acerca de Nosotros</a>
                    </li>
                    <li>
                        <a data-scroll class="link" href="#nuestro-colegio">Nuestro Colegio</a>
                    </li>
                    <li>
                        <a data-scroll class="link" href="#historia">Historia</a>
                    </li>
                    <li>
                        <a data-scroll class="link" href="#contacto">Contactenos</a>
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
                                <a class="link" href="empleados/principal">
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
