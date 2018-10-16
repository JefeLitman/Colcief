<!-- Modelo de la de hogar al iniciar sesion -->
<!DOCTYPE html>
<html>
<head>
    <!-- Esta es la plantilla para el manejo de sesion en laravel -->
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
      <!--precarga-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/preload.css') }}"/>
      <!-- Definiendo el titulo de la pagina -->
      <title>ColCIEF - @yield('titulo')</title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
        <!-- Precarga-->
        <div class="preloader-background" id="preloader-background">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>
            </div>
        </div>
    <!-- En esta parte va el menu con la directiva includee para que quede en el lugar -->
    @guest
        @include('menus.admin')
    @endguest
    {{-- @guest
        @include('menus.principal')
    @endguest --}}
    <!-- Aqui en esta seccion va estar el contenido de la pagina -->
    <main>
	    <div class="container">
            @section('contenedor_principal')
            @show
        </div>
    </main>

    <!-- En esta parte va el pie de pagina con la directiva include para que quede en el lugar -->
    @auth
        @include('footers.admin')
    @endauth
    @guest
        @include('footers.principal')
    @endguest
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //menu
            $('.sidenav').sidenav();
            $('.slider').slider();
            $('.dropdown-trigger').dropdown();
            //Ventana emergente modal @Eduu mira aqui esta el jquery
            $('.modal').modal();
            $('#modal1').modal('open');
            // $('.modal').modal();
            //Configuración de la fecha
            $('.datepicker').datepicker();
            $('#datepicker').datepicker(
                {
                    format:'yyyy/mm/dd',
                    yearRange:150
                }
            );
        });
        //Configuracion de la precarga
        window.onload = function(){
            var contenedor = document.getElementById('preloader-background');
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
        }

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems, options);
        });

        // $(document).ready(function(){
        //     $('select').formSelect();
        // });

        //Para mostrar los modales al dar clic @Eduard

        //permite ver imagenes en materialboxed

        $(document).ready(function(){
            $('.materialboxed').materialbox();
        });

    </script>


</body>
</html>
