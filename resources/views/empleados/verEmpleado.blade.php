@extends('contenedores.admin')
@section('titulo',' Ver empleado')
@section('contenedor_admin')
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
<br>
<div class="container">
    <div class="card mx-auto border-dark bg-light" style="width: 20rem; border-color:#66bb6a !important;">
        <div class="card-header" style="background-color:#66ba6a7d !important;">
            <img class="card-img-top" src="{{$empleado->foto}}" alt="Card image cap">
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                <h5 class="card-title text-center">
                    <i class="fas fa-user-tie"></i>
                    <br>
                    {{$empleado->nombre}}
                    <br>
                    {{$empleado->apellido}}
                </h5>
            </li>
            <li class="list-group-item" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                <h5 class="card-title text-center">
                    <i class="fas fa-id-card"></i>
                    <br>
                    {{$empleado->cedula}}
                </h5>
            </li>
            <li class="list-group-item" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                <h5 class="card-title text-center">
                    <i class="fas fa-graduation-cap"></i>
                    <br>
                    {{$empleado->titulo}}
                </h5>
            </li>
        </ul>
    </div>
    {{-- <div class="row">
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
    </div> --}}
</div>
<br>
@endsection
