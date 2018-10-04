@extends('contenedores.admin')
@section('titulo','Ver estudiantes')
@section('contenedor_principal')
	{{-- Guia Front --}}
	{{-- Se envía el objeto $estudiante y el objeto $acudiente --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>EstudianteController.php  funcion show()
		 @Autor Paola C. --}}
    {{-- URL: localhost:8000\estudiantes\{pk_estudiante} --}}
    {{-- <h3>Tipo de Archivos:</h3> $estudiante: {{ gettype($estudiante)}}, $acudiente: {{ gettype($acudiente)}} <br>
	<h3>Contenido estudiante:</h3> {{$estudiante}} <br>
	<h3>Contenido acudiente:</h3> {{$acudiente}} <br>
    <h1>Ejemplos</h1> --}}
    <div class="row">
        <div class="col s1"></div>
        <div class="col s2"></div>
        <div class="col s5 center"><br>
            <div class="card green lighten-5">
                <div class="card-content">
                    <a href="#user"><img class="circle" src="{{Storage::url($estudiante->foto)}}" width="200px"></a>
                    <div class="row center">
                        <div class="col s12 center">
                            <h6 class=" blue-grey-text darken-4"><i class="small material-icons rigth">assignment_ind</i>
                            <br> Nombre: {{$estudiante->nombre}} {{$estudiante->apellido}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s2"></div>
        <div class="col s1"></div>
    </div>
@endsection
