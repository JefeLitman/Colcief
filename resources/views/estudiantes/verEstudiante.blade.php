@extends('contenedores.admin')
@section('titulo','Estudiante '.$estudiante->pk_estudiante)
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
                    <div class="row center">
                        <div class="col s12">
                            <img class="responsive-img" style="max-width:400px;" src="{{Storage::url($estudiante->foto)}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1"></div>
                        <div class="col s3">
                            <i class="blue-grey-text medium material-icons">face</i>
                        </div>
                        <div class="col s7">
                            <h5 class="blue-grey-text">{{$estudiante->nombre}}<br>{{$estudiante->apellido}}</h5>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col s1"></div>
                            <div class="col s3">
                                <i class="blue-grey-text medium material-icons">grade</i>
                            </div>
                            <div class="col s7">
                                <h5 class="blue-grey-text"> @switch($estudiante->grado)
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
                                        
                                @endswitch </h5>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col s2"></div>
        <div class="col s1"></div>
    </div>
@endsection
