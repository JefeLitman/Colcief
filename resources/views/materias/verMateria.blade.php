@extends('contenedores.admin')
@section('titulo','Ver materia')
@section('contenedor_admin')
{{-- mensajes de error --}}
@include('error.error')
	{{-- Guia Front --}}
	{{-- Se envía el objeto $materia --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaController.php  funcion show()
		 @Autor Paola C. --}}
	{{-- URL: localhost:8000\materia\{pk_materia} --}}
	{{-- <h3>Tipo de Archivos:</h3> $materia: {{ gettype($materia)}} <br>
    <h3>Contenido materia:</h3> {{$materia}} <br> --}}
    <br>
    <div class="container" style="background:#fafafa !important;">
        <div class="card mx-auto border-dark bg-light" style="width: 20rem; border-color:#66bb6a !important;">
            <div class="card-header" style="background-color:#66ba6a7d !important;">
                <h2 class="text-center">{{$materia->nombre}}</h2>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-center" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                    <h5 class="card-title text-center">
                        <i class="fas fa-star"></i><br>
                        {{$materia->pk_materia}}
                    </h5>
                </li>
                <li class="list-group-item" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                    <h5 class="card-title text-center">
                        <i class="fas fa-book-open"></i><br>
                        {{$materia->contenido}}
                    </h5>
                </li>
                <li class="list-group-item text-center" style="     border-top-color: #66bb6a !important;">
                    <h5 class="card-title text-center">
                        <i class="fas fa-trophy "></i><br>{{ $materia->logros_custom }}
                    </h5>
                </li>
            </ul>
        </div>
    </div>
@endsection
