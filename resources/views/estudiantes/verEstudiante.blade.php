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
<div class="container" style="background:#fafafa !important;">
    <h4 class="text-center">
        Datos de {{$estudiante->nombre}} {{$estudiante->apellido}}
    </h4>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center" style="background-color: rgba(0,0,0,.03) !important; float:center !important; border-color: #17a2b8 !important; border-radius:0.25rem !important;">
                <img class="card-img-top" src="{{$estudiante->foto}}" alt="Card image cap" style="padding: 5px 5px 5px 5px;">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body" style="border-color:#66bb6a !important;">
                <div class="table-responsive">
                    <table class="table table-hover mr-auto">
                        <thead style="background-color: rgba(0,0,0,.03) !important;">
                            <tr>
                                <th scope="col" style="color:#0a7788" class="text-center">Acudiente</th>
                                <th scope="col" style="color:#0a7788" class="text-center">Fecha de nacimiento</th>
                                <th scope="col" style="color:#0a7788" class="text-center">Discapacida</th>
                                <th scope="col" style="color:#0a7788" class="text-center">Grado</th>
                                {{-- <th scope="col" style="color:#0a7788" class="text-center">Curso</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- Acudiente --}}
                                <td class="text-center">{{$acudiente->nombre_acu_1}}</td>
                                {{-- fecha de nacimiento --}}
                                <td class="text-center">{{$estudiante->fecha_nacimiento}}</td>
                                {{-- discapacidad --}}
                                <td class="text-center">
                                    @php
                                        $discapacidad=["No","Si"]
                                    @endphp
                                    @foreach ($discapacidad as $i=>$value)
                                        @if (intval($estudiante->discapacidad)==$i)
                                            {{$value}}
                                        @endif
                                    @endforeach
                                </td>
                                {{-- grado --}}
                                <td class="text-center">
                                    @php
                                        $grado=["Preescolar","Primero","Segundo","Tercero","Cuarto","Quinto","Sexto","Septimo","Octavo","Noveno","Decimo","Once"]
                                    @endphp
                                    @foreach ($grado as $j=>$value)
                                        @if (intval($estudiante->grado)==$j)
                                            {{$value}}
                                        @endif
                                    @endforeach
                                </td>
                                {{-- <td class="text-center">
                                    {{$cursos->prefijo}}
                                </td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mx-auto border-dark bg-light" style="width: 20rem; border-color:#17a2b8 !important;">
                <div class="card-header" style="background-color: rgba(0,0,0,.03) !important;">
                    <img class="card-img-top" src="{{$estudiante->foto}}">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center" style="border-top-color: #17a2b8 !important; border-bottom-color: #17a2b8 !important;">
                        <h5 class="card-title text-center">
                            <i class="fas fa-id-card-alt"></i>
                            <br> {{$estudiante->nombre}}<br>{{$estudiante->apellido}}
                        </h5>
                    </li>
                    <li class="list-group-item text-center" style="border-top-color: #17a2b8 !important; border-bottom-color: #17a2b8 !important;">
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
                    <li class="list-group-item " style="border-top-color: #17a2b8 !important; border-bottom-color: #17a2b8 !important;">
                        <h5 class="card-title text-center">
                            <i class="fas fa-user-tie"></i>
                            <br>
                            {{$acudiente->nombre_acu_1}}
                        </h5>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}
<br>
@endsection
