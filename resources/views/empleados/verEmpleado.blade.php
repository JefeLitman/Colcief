@extends('contenedores.admin')
@section('titulo',' Ver empleado')
@section('contenedor_principal')
	{{-- Guia Front --}}
	{{-- Se envía el objeto $empleado --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>EmpleadoController.php  funcion show()
		 @Autor Paola C. --}}
    {{-- URL: localhost:8000\empleados\{pk_empleado} --}}
    @if(session()->has('false'))
        <div class="alert alert-danger danger-dismissible fade show hidden" role="alert">
        {{session('false')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="color:#812c3b">&times;</span>
            </button>
        </div>
        <script>
            $(document).ready(function(){
                $("div").fadeIn();
            });
        </script>
    @elseif(session()->has('true'))
        <div class="alert alert-success success-dismissible fade show hidden" role="alert">
            {{session('true')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="color:blue">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col s1"></div>
        <div class="col s2"></div>
        <div class="col s5 centar"><br>
            <div class="card green lighten-5">
                <div class="card-content">
                    <div class="row center">
                        <div class="col s12">
                            <img class="responsive-img" style="max-width:400px;" src="{{$empleado->foto}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1"></div>
                        <div class="col s3 center">
                            <i class="blue-grey-text small material-icons">face</i>
                            <p class="blue-grey-text">Empleado</p>
                        </div>
                        <div class="col s7">
                            <h5 class="blue-grey-text center">
                                {{$empleado->nombre}}<br>
                                {{$empleado->apellido}}
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1"></div>
                        <div class="col s3 center">
                            <i class="blue-grey-text small material-icons">school</i>
                            <p class="blue-grey-text">Título</p>
                        </div>
                        <div class="col s7">
                            <h5 class="blue-grey-text center">
                                {{$empleado->titulo}}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	{{--  <h3>Tipo de Archivos:</h3> $estudiante: {{ gettype($empleado)}} <br>
	<h3>Contenido acudiente:</h3> {{$empleado}} <br>

	<h1>Ejemplos</h1>
	Foto:
		<img src="{{$empleado->foto}}" width="200px">
		<br>
	Nombre: {{$empleado->nombre}} <br>
	Apellido: {{$empleado->apellido}} <br>  --}}
@endsection
