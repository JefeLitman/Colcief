
<nav class="navbar navbar-expand-lg navbar-dark fixed-top lead" style="background-color: #1e88e5; height:50px;">
    <a class="navbar-brand" href="#">
        <img src="{{asset('css/img/logo_min_1.png')}}"  height="30" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item @if (Request::path()=="/") active @endif ">
          <a class="nav-link " href="{{ url('/') }}"> <i class="fas fa-home"></i> Inicio</a>
        </li>
        <li class="nav-item @if (Request::path()=="nosotros") active @endif ">
          <a class="nav-link" href="{{ url('/nosotros') }}"><i class="fas fa-graduation-cap"></i> Nuestro Colegio</a>
        </li>
        <li class="nav-item @if (Request::path()=="contacto") active @endif ">
          <a class="nav-link" href="{{ url('/contacto') }}"><i class="fas fa-phone"></i> Contactenos</a>
        </li>
        <li class="nav-item @if (Request::path()=="login") active @endif ">
          <a class="nav-link" href="
          @switch(session('role'))
                @case('estudiante')
                    {{ url('/estudiantes/principal') }}" ><i class="fas fa-sign-in-alt"></i> {{ucwords(session('user')['nombre'])}}</a>
                    @break
            
                @case('admin')
                    {{ url('/empleados/principal') }}" ><i class="fas fa-sign-in-alt"></i> {{ucwords(session('user')['nombre'])}}</a>
                    @break
            
                @default
                    {{ url('/login') }}"> <i class="fas fa-sign-in-alt"></i> Login </a>
                @endswitch
        </li>
      </ul>
    </div>
  </nav>
