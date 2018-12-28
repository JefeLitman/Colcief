@extends('contenedores.admin')
@section('titulo',' Ver empleado')
@section('contenedor_admin')
	{{-- Guia Front --}}
	{{-- Se envía el objeto $empleado --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>EmpleadoController.php  funcion show()
		 @Autor Paola C. --}}
    {{-- URL: localhost:8000\empleados\{pk_empleado} --}}
<br>
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mx-auto border-dark bg-light" style="width: 20rem; border-color: #17a2b8 !important;">
                <div class="card-header" style="background-color:rgba(0,0,0,.03) !important;">
                    <img class="card-img-top" src="{{$empleado->foto}}" alt="Card image cap">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="border-top-color:  #17a2b8 !important; border-bottom-color:  #17a2b8 !important;">
                        <h5 class="card-title text-center">
                            <i class="fas fa-user-tie"></i>
                            <br>
                            {{$empleado->nombre}}
                            <br>
                            {{$empleado->apellido}}
                        </h5>
                    </li>
                    <li class="list-group-item" style="border-top-color:  #17a2b8 !important; border-bottom-color:  #17a2b8 !important;">
                        <h5 class="card-title text-center">
                            <i class="fas fa-id-card"></i>
                            <br>
                            {{$empleado->cedula}}
                        </h5>
                    </li>
                    <li class="list-group-item" style="border-top-color:  #17a2b8 !important; border-bottom-color:  #17a2b8 !important;">
                        <h5 class="card-title text-center">
                            <i class="fas fa-graduation-cap"></i>
                            <br>
                            {{$empleado->titulo}}
                        </h5>
                    </li>
                </ul>
            </div>
        </div>
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
