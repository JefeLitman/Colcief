<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ColCIEF - @yield('titulo') {{session('role')}}</title>
    <meta name="description" content="Colegio Integrado Ezequiel Florián. Somos una institución educativa ubicada en el casco urbano del municipio de Florián Santander que cuenta con 3 sedes que van desde el grado transición hasta undécimo grado en amplias y acogedoras instalaciones con mas de 40 años formando líderes...">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    {{-- CSSs --}}
    <link rel="stylesheet" href="{{ asset('css/shards.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shards-extras.min.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- SCRIPTS --}}
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/smooth-scroll.min.js') }}"></script>
    <script>
      var scroll = new SmoothScroll('a[href*="#"]', {
        speed: 2500,
        speedAsDuration: true
      });
    </script>
    <style>
      .corner-wrapper {
        overflow: hidden;
        border-top-left-radius: .625rem;
        border-top-right-radius: .625rem;
        transform: translateZ(0px);
      }
    </style>
  </head>
  <body class="shards-app-promo-page--1">
    <div class="spinner-grow" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    @if (Request::path()=="/")
      @include('pantallas.login')
    @endif

    @yield('contenedor_login')

    {{-- <!-- Features Section -->
    <div id="app-features" class="app-features section">
      <div class="container-fluid">
        <div class="row">
          <div class="app-screenshot col-lg-4 col-md-12 col-sm-12 px-0 py-5">
            <img class="mt-auto mb-auto" src="img/app-promo/iphone-app-screenshot.png" alt="App Screenshot - Shards App Promo Demo Page">
          </div>

          <!-- App Features Wrapper -->
          <div class="app-features-wrapper col-lg-4 col-md-6 col-sm-12 py-5 mx-auto">
            <div class="container">
              <h3 class="section-title underline--left my-5">Features</h3>
              <div class="feature py-4 d-flex">
                <div class="icon text-white bg-success mr-5"><i class="fas fa-refresh"></i></div>
                <div>
                    <h5>Everything Synced</h5>
                    <p>Quisque mollis mi ac aliquet accumsan. Sed sed dapibus libero. Nullam luctus purus duis sensibus signiferumque.</p>
                </div>
              </div>

              <div class="feature py-4 d-flex">
                <div class="icon text-white bg-success mr-5"><i class="fas fa-shield"></i></div>
                <div>
                    <h5>Security</h5>
                    <p>Quisque mollis mi ac aliquet accumsan. Sed sed dapibus libero. Nullam luctus purus duis sensibus signiferumque.</p>
                </div>
              </div>

              <div class="feature py-4 d-flex">
                <div class="icon text-white bg-success mr-5"><i class="fas fa-share"></i></div>
                <div>
                    <h5>Sharing</h5>
                    <p>Quisque mollis mi ac aliquet accumsan. Sed sed dapibus libero. Nullam luctus purus duis sensibus signiferumque.</p>
                </div>
              </div>

              <div class="feature py-4 d-flex">
                <div class="icon text-white bg-success mr-5"><i class="fas fa-globe"></i></div>
                <div>
                    <h5>Access Anywhere</h5>
                    <p>Quisque mollis mi ac aliquet accumsan. Sed sed dapibus libero. Nullam luctus purus duis sensibus signiferumque.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Features Section --> --}}

    <div class="nosotros section py-4" id="nosotros">
      <h3 class="section-title text-center m-5">Acerca de Nosotros</h3>

      <div class="container py-3">
        <div class="row">
            <div ALIGN="justify" class="col-sm-6 border-right">
              <h5 class="text-center">Misión</h5>
              <p class="p-3">
                Somos una comunidad educatica que forma integralmente a la persona para que sea lider y promotora del desarrollo sostenible de la región; creativa recursiva, libre y responsable con mentalidad empresarial, respetuosa de su entorno y con profundo sentido de pertenecia.
              </p>
            </div>
            <div ALIGN="justify" class="col-sm-6 border-left">
              <h5 class="text-center">Visión</h5>
              <p class="p-3">
                Aspiramos a que la institución sea un modelo educativo a nivel local, regional y nacional, que contribuya a mejorar la calidad de vida, y logre el desarrollo sostenible a través de la formación de lideres socioambientales.
              </p>
            </div>  
        </div>
      </div>
      <div class="py-4"></div>
    </div>

    <!-- Testimonials Section -->
    <div class="testimonials section py-4">
        <h3 class="section-title text-center m-5">Testimonials</h3>

        <div class="container py-5">
          <div class="row">
              <div class="col-md-4 testimonial text-center">
                  <div class="avatar rounded-circle with-shadows mb-3 ml-auto mr-auto">
                      <img src="img/common/avatar-1.jpeg" class="w-100" alt="Testimonial Avatar" />
                  </div>
                  <h5 class="mb-1">Osbourne Tranter</h5>
                  <span class="text-muted d-block mb-2">CEO at Megacorp</span>
                  <p>Vivamus quis ex mattis, gravida erat a, iaculis urna. Proin ac eleifend tortor. Nunc in augue eget enim venenatis viverra.</p>
              </div>

              <div class="col-md-4 testimonial text-center">
                  <div class="avatar rounded-circle with-shadows mb-3 ml-auto mr-auto">
                      <img src="img/common/avatar-2.jpeg" class="w-100" alt="Testimonial Avatar" />
                  </div>
                  <h5 class="mb-1">Darrin Ollie</h5>
                  <span class="text-muted d-block mb-2">CEO at Megacorp</span>
                  <p>Nullam eu ligula facilisis, commodo velit non, vulputate dolor. Aenean congue euismod vestibulum.</p>
              </div>

              <div class="col-md-4 testimonial text-center">
                  <div class="avatar rounded-circle with-shadows mb-3 ml-auto mr-auto">
                      <img src="img/common/avatar-3.jpeg" class="w-100" alt="Testimonial Avatar" />
                  </div>
                  <h5 class="mb-1">Quinton Bruce</h5>
                  <span class="text-muted d-block mb-2">CEO at Megacorp</span>
                  <p> Aenean imperdiet ultrices tortor id convallis. Donec id metus magna. Morbi pretium odio faucibus blandit gravida.</p>
              </div>
          </div>
        </div>
    </div>
    <!-- / Testimonials Section -->

    <!-- Our Blog Section -->
    <div class="blog section section-invert py-4" id="nuestro-colegio">
      <h3 class="section-title text-center m-3">Nuestro Colegio</h3>
      <div class="m-3 py-5">
        {{-- <div class="py-4">
          <div class="row"> --}}
            <div class="card-columns" style="font-size: 0.8rem;">
              {{-- <div class="col-md-6 col-lg-4 col-12"> --}}
                <div class="card mb-4">
                  <div class="corner-wrapper">
                    <iframe class="card-img-top" id="videoSalida" src="https://www.youtube.com/embed/t-YusdBEheI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">40 años ColCIEF</h5>
                    <p class="card-text">
                      FLORIAN SANTANDER COLOMBIA CUMPLEAÑOS DEL MUNICIPIO Y COLEGIO EZEQUIEL FLORIAN 2010, CRISTIAN NEIRA, AVVIO TELEVISIÓN.
                      MARCANDO PASOS CANAL TRO Y RCI.
                    </p>
                  </div>
                </div>
                <div class="card mb-4">
                  <div class="corner-wrapper">
                    <iframe class="card-img-top" id="videoSalida" src="https://www.youtube.com/embed/ZxAmzM1UBQI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">CIEF en el foro educativo</h5>
                    <p class="card-text">
                      El Colegio Integrado Ezequiel Florián y el programa radial Colegio en Sintonia 88.8 fm se hace presente a la invitación realizada por el Ministerio de Educación y Microsoft.
                    </p>
                  </div>
                </div>
                
                <div class="card mb-4">
                  <img class="card-img-top" src="{{asset('img/familia1.jpg')}}" alt="Dia de la familia">
                  <div class="card-body">
                    <h5 class="card-title">Día de la Familia CIEF</h5>
                    <p class="card-text">El pasado viernes 24 de Abril se celebró el dia de la familia CIEF. Una jornada llena de expresiones culturales, agradecimiento al Dios de los cielos, integración y diversión familiar. Estos son algunos de esos momentos especiales.</p>
                  </div>
                </div>
              {{-- </div> --}}

              {{-- <div class="col-md-6 col-lg-4 col-12"> --}}
                <div class="card mb-3">
                  <img class="card-img-top" src="{{asset('img/digital.jpg')}}" alt="Vive">
                  <div class="card-body">
                    <h5 class="card-title">Forian ya vive digital?</h5>
                    <p class="card-text">Hace un par de dias colocaron esta pancarta, informando a la comunidad que nuestro municipio que ya cuenta con Internet de fibra óptica, la cuál es para la alcaldía e instituciones educativas según dijo el señor Gobernador en el pasado consejo comunal, pero hasta ahora nuestros estudiantes no pueden disfrutar de este beneficio, ya que al dia de hoy llevamos cerca de un año sin esta conexión.</p>
                  </div>
                </div>
              {{-- </div> --}}

              {{-- <div class="col-md-6 col-lg-4 col-12"> --}}
                <div class="card mb-4">
                  <img class="card-img-top" src="{{asset('img/biblioteca.jpg')}}" alt="biblioteca">
                  <div class="card-body">
                    <h5 class="card-title">Biblioteca del CIEF ahora con lo último</h5>
                    <p class="card-text">El Ministerio de Educación donó al la institución 235 libros y la Secretaria de Educación donó entre material didáctico y libros un aproximado de 200 ejemplares, la mayoría con temas para básica primaria para que de esta forma incentivemos la lectura en nuestros educandos. Estos libros permanecerán en la biblioteca del colegio para que los docentes soliciten el préstamo para trabajar con sus alumnos.</p>
                  </div>
                </div>

                <div class="card mb-4">
                  <img class="card-img-top" src="{{asset('img/educacion.jpg')}}" alt="Educación sexual">
                  <div class="card-body">
                    <h5 class="card-title">Educación Sexual</h5>
                    <p class="card-text">La Ese san José de Florian y la Policía local realizaron el pasado miércoles una charla informativa sobre educación sexual a los grados noveno, décimo y undécimo.</p>
                  </div>
                </div>
                <div class="card mb-4">
                  <img class="card-img-top" src="{{asset('img/gobernacion.jpg')}}" alt="Gobernación">
                  <div class="card-body">
                    <h5 class="card-title">El CIEF cada vez mejor</h5>
                    <p class="card-text">El pasado sábado  11 de Mayo en las horas de la tarde Florián tuvo el honor de recibir la visita del señor gobernador del departamento Richard Aguilar, acompañado de su equipo de secretarios y algunos funcionarios,  además de la alcaldesa del municipio de la Belleza Azucena Rojas y como anfitrión quien administra los intereses de nuestro municipio, el señor  Nestor Vladimir Forero que quien junto con la comunidad florianence realizaron un Consejo Comunal en donde se expuso las necesidades de nuestro municipio y también se recibieron gratas sorpresas no solo para el municipio sino también para nuestra institución educativa que contará a partir de ahora con un laboratorio de física y química además de 7 tableros inteligentes que se encuentran ubicados en los grados novenos, décimos, undécimos y en el aula de informática.  Para la primaria una piscina de pelotas.</p>
                  </div>
                </div>
              {{-- </div> --}}
            </div>
          {{-- </div>
        </div> --}}
      </div>
    </div>
    <!-- / Our Blog Section -->

    <!-- Contact Section -->
    <div class="contact section-invert py-4" id="contacto">
      <h3 class="section-title text-center m-5">Contactenos</h3>
      <div class="container py-4">
        <div class="row justify-content-md-center px-4">
          @if(session()->has('exito'))
            <div class="col-sm-12 col-md-10 col-lg-7">
              <div class="row">
                <div id="info" class="alert alert-success success-dismissible fade show hidden" role="alert" style="width:100%;border-radius: .625rem;">
                    {{session('exito')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="text-white" aria-hidden="true">&times;</span>
                    </button>
                </div>
              </div>
            </div>
            @php
                session() -> forget('exito')
            @endphp
          @endif
          <div class="contact-form col-sm-12 col-md-10 col-lg-7 p-4 mb-4 card">
            <form action="{{url('contacto')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="contactFormFullName">Nombre</label>
                    <input type="text" class="form-control" id="contactFormFullName" placeholder="Ingrese su nombre completo" name="nombre">
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="contactFormEmail">Correo Electrónico</label>
                    <input type="email" class="form-control" id="contactFormEmail" placeholder="Ingrese su correo electrónico" name="correo">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Mensaje</label>
                      <textarea id="exampleInputEmail1" class="form-control mb-4" rows="10" placeholder="Ingrese su mensaje" name="mensaje"></textarea>
                  </div>
                </div>
              </div>
              <input class="btn btn-success btn-pill d-flex ml-auto mr-auto" type="submit" value="Enviar Mensaje">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- / Contact Section -->

    @include('pantallas.footer')
  </body>
</html>

