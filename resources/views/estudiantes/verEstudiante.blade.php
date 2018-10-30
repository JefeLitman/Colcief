@extends('contenedores.admin')
@section('titulo','Ver estudiante')
@section('contenedor_admin')
	{{-- Guia Front --}}
	{{-- Se envía el objeto $estudiante y el objeto $acudiente --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>EstudianteController.php  funcion show()
		 @Autor Paola C. --}}
    {{-- URL: localhost:8000\estudiantes\{pk_estudiante} --}}
    {{-- <h3>Tipo de Archivos:</h3> $estudiante: {{ gettype($estudiante)}}, $acudiente: {{ gettype($acudiente)}} <br>
	<h3>Contenido estudiante:</h3> {{$estudiante}} <br>
	<h3>Contenido acudiente:</h3> {{$acudiente}} <br>
    <h1>Ejemplos</h1> --}}

<br>
<div class="container">
    <div class="card  mx-auto border-dark bg-light" style="width: 20rem;">
        <img class="responsive-img" style="max-width:400px;" src="{{$estudiante->foto}}">
        <ul class="list-group list-group-flush">
            <li class="list-group-item border-dark bg-light">
                <h5 class="card-title text-center">
                    <i class="fas fa-id-card-alt"></i>
                    <br> {{$estudiante->nombre}}<br>{{$estudiante->apellido}}
                </h5>
            </li>
            <li class="list-group-item border-dark bg-light">
                <h5 class="card-title text-center">
                    <i class="fas fa-star"></i>
                    <br>
                        @switch($estudiante->grado)
                        @case(0)
                            Preescolar
                            @break
                        @case(1)
                            Primero
                            @break
                        @case(2)
                            Segundo
                            @break
                        @case(3)
                            Tercero
                            @break
                        @case(4)
                            Cuarto
                            @break
                        @case(5)
                            Quinto
                            @break
                        @case(6)
                            Sexto
                            @break
                        @case(7)
                            Septimo
                            @break
                        @case(8)
                            Octavo
                            @break
                        @case(9)
                            Noveno
                            @break
                        @case(10)
                            Decimo
                            @break
                        @case(11)
                            Once
                            @break
                    @endswitch
                </h5>
            </li>
            <li class="list-group-item border-dark bg-light">
                <h5 class="card-title text-center">
                    <i class="fas fa-user-tie"></i>
                    <br>
                    {{$acudiente->nombre_acu_1}}
                </h5>
            </li>
        </ul>
    </div>
</div>
<br>
@endsection
