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
<style>
    .r {
        background-color: #fff;
    }
    @media (max-width: 576px) {
        .g {
            display: none !important;
        }
    }
</style>
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <img class="card-img-top" src="{{$estudiante->foto}}" alt="Card image cap">
                        <div class="card-footer" title="Código">
                            <div class="float-left g">Código</div>
                            <div class="text-muted" style="text-align: right;">{{$estudiante->pk_estudiante}}</div>
                        </div>
                        <div class="card-footer" title="Nombre">
                            <div class="float-left g">Nombre</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($estudiante->nombre)}}</div>
                        </div>
                        <div class="card-footer" title="Apellido">
                            <div class="float-left g">Apellido</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($estudiante->apellido)}}</div>
                        </div>
                        <div class="card-footer" title="Fecha de Nacimiento" >
                            <div class="float-left g">Fecha de Nacimiento</div>
                            <div class="text-muted" style="text-align: right;">{{$estudiante->fecha_nacimiento}}</div>
                        </div>
                        <div class="card-footer" title="Discapacidad">
                            <div class="float-left g">Discapacidad</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($estudiante->Discapacidad == 0 ? 'no' : 'si' )}}</div>
                        </div>
                        <div class="card-footer" title="Curso">
                            <a href="/estudiantes/cursos/{{$curso -> pk_curso}}">
                                <div class="float-left g">Curso</div>
                                <div class="text-muted" style="text-align: right;">{{ucwords($curso -> prefijo.'-'.$curso -> sufijo)}}</div>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-6">
                    @if (!empty($acudiente))
                        <div class="card">
                            <div class="card-header">
                                Acudiente #1 
                            </div>
                            <div class="card-footer r" title="Nombre">
                                <div class="float-left g">Nombre</div>
                                <div class="text-muted" style="text-align: right;">{{ucwords($acudiente->nombre_acu_1)}}</div>
                            </div>
                            <div class="card-footer r" title="Télefono">
                                <div class="float-left g">Télefono</div>
                                <div class="text-muted" style="text-align: right;">{{ucwords($acudiente->telefono_acu_1)}}</div>
                            </div>
                            <div class="card-footer r" title="Dirección">
                                <div class="float-left g">Dirección</div>
                                <div class="text-muted" style="text-align: right;">{{ucwords($acudiente->direccion_acu_1)}}</div>
                            </div>
                        </div>
                        <br>
                        @unless (empty($acudiente -> nombre_acu_2) && empty($acudiente -> telefono_acu_2) && empty($acudiente -> direccion_acu_2))
                            <div class="card">
                                <div class="card-header">
                                    Acudiente #2 
                                </div>
                                @if (!empty($acudiente -> nombre_acu_2))
                                    <div class="card-footer r" title="Nombre">
                                        <div class="float-left g">Nombre</div>
                                        <div class="text-muted" style="text-align: right;">{{ucwords($acudiente->nombre_acu_2)}}</div>
                                    </div>
                                @endif
                                @if (!empty($acudiente -> telefono_acu_2))
                                    <div class="card-footer r" title="Télefono">
                                        <div class="float-left g">Télefono</div>
                                        <div class="text-muted" style="text-align: right;">{{ucwords($acudiente->telefono_acu_2)}}</div>
                                    </div>
                                @endif
                                @if (!empty($acudiente -> direccion_acu_2))
                                    <div class="card-footer r" title="Dirección">
                                        <div class="float-left g">Dirección</div>
                                        <div class="text-muted" style="text-align: right;">{{ucwords($acudiente->direccion_acu_2)}}</div>
                                    </div>
                                @endif
                            </div>
                        @endunless
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
