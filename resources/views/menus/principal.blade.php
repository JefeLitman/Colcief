
<!-- Menu principal -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1e88e5;">
        <!--Espacio donde estara el logo de la pagina -->
        <a href="{{ url('/') }}" class="brand-logo"><img src="{{asset('css/img/logo_min_1.png')}}"></a>
        {{--  boton de menu para el responsive  --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            {{--  menu  --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{--  <!--Link que hace referencia al menu responsivo -->
                <a href="#" data-target="menu-responsivo" class="sidenav-trigger"><i class="material-icons">menu</i></a>  --}}
                <!--Menu normal en modo grande -->
                <ul class="nav navbar-nav navbar-right mr-auto"> {{-- id="menu" --}}
                    {{--  Inicio  --}}
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}" style="color: #ffffff;">&nbsp &nbsp Inicio &nbsp &nbsp<span class="sr-only">(current)</span><i class="material-icons right">home</i></a></li>
                    {{--  Nuestro Colegio  --}}
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}" style="color: #ffffff;">&nbsp &nbsp Nuestro Colegio &nbsp &nbsp<i class="material-icons right">school</i></a></li>
                    {{--  Contactenos  --}}
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}" style="color: #ffffff;">&nbsp &nbsp Contactenos &nbsp &nbsp<i class="material-icons right">local_phone</i></a></li>
                    {{--  Login  --}}
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}" style="color: #ffffff;">&nbsp &nbsp Login &nbsp &nbsp<i class="material-icons right">account_circle</i></a></li>

                </ul>
            </div>
        </nav>