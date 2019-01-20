@extends('contenedores.admin')
@section('titulo','Ver estudiante')
@section('contenedor_admin')
	{{-- d-none d-sm-blockuia Front --}}
	{{-- Se envía el objeto $estudiante y el objeto $acudiente --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>EstudianteController.php  funcion show()
		 @Autor Paola C. --}}
    {{-- URL: localhost:8000\estudiantes\{pk_estudiante} --}}
    {{-- <h3>Tipo de Archivos:</h3> $estudiante: {{ d-none d-sm-blockettype($estudiante)}}, $acudiente: {{ d-none d-sm-blockettype($acudiente)}} <br>
	<h3>Contenido estudiante:</h3> {{$estudiante}} <br>
	<h3>Contenido acudiente:</h3> {{$acudiente}} <br>
    <h1>Ejemplos</h1> --}}
<style>
    .r {
        background-color: #fff;
    }
</style>
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-12 col-lg-10 col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{$estudiante->foto}}" alt="Card image cap">
                        <div class="card-footer" title="Código">
                            <div class="float-left d-none d-sm-block">Código</div>
                            <div class="text-muted" style="text-align: right;">{{$estudiante->pk_estudiante}}</div>
                        </div>
                        <div class="card-footer" title="Nombre">
                            <div class="float-left d-none d-sm-block">Nombre</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($estudiante->nombre)}}</div>
                        </div>
                        <div class="card-footer" title="Apellido">
                            <div class="float-left d-none d-sm-block">Apellido</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($estudiante->apellido)}}</div>
                        </div>
                        <div class="card-footer" title="Fecha de Nacimiento" >
                            <div class="float-left d-none d-sm-block">Fecha de Nacimiento</div>
                            <div class="text-muted" style="text-align: right;">{{$estudiante->fecha_nacimiento}}</div>
                        </div>
                        <div class="card-footer" title="Discapacidad">
                            <div class="float-left d-none d-sm-block">Discapacidad</div>
                            <div class="text-muted" style="text-align: right;">{{ucwords($estudiante->Discapacidad == 0 ? 'no' : 'si' )}}</div>
                        </div>
                        <div class="card-footer" title="Curso">
                            <a href="/estudiantes/cursos/{{$curso -> pk_curso}}">
                                <div class="float-left d-none d-sm-block">Curso</div>
                                <div class="text-muted" style="text-align: right;"><span class="badge badge-pill badge-info">{{ucwords($curso -> prefijo.'-'.$curso -> sufijo)}}</span></div>
                            </a>
                        </div>
                        @if (session('role') == 'administrador')
                            <div class="card-footer" title="Acciones">
                                <div class="float-left d-none d-sm-block">Acciones</div>
                                <div class="" style="text-align: right;">
                                    <a href="/boletines/actual/estudiantes/{{$estudiante->pk_estudiante}}" title="Ver notas"><i class="fas fa-clipboard-list" style="color:#00838f"></i></a>
                                    <a href="{{ route('estudiantes.edit', $estudiante->pk_estudiante) }}" title="Editar"><i  class="fas fa-edit" style="color:#00838f"></i></a>
                                    <a class="delete" direccion="/estudiantes/cursos/{{$estudiante->fk_curso}}" padre="null" ruta="estudiantes" identificador="{{$estudiante->pk_estudiante}}"><i title="Eliminar" class="fas fa-trash-alt" style="color:#c62828"></i></a>
                                </div>
                            </div>
                        @endif
                    
                    </div>
                </div>
                <br>
                <div class="col-sm-6">
                    @if (!empty($acudiente))
                        <div class="card">
                            <div class="card-header">
                                Acudiente #1 
                            </div>
                            <div class="card-footer r" title="Nombre">
                                <div class="float-left d-none d-sm-block">Nombre</div>
                                <div class="text-muted" style="text-align: right;">{{ucwords($acudiente->nombre_acu_1)}}</div>
                            </div>
                            <div class="card-footer r" title="Télefono">
                                <div class="float-left d-none d-sm-block">Télefono</div>
                                <div class="text-muted" style="text-align: right;">{{ucwords($acudiente->telefono_acu_1)}}</div>
                            </div>
                            <div class="card-footer r" title="Dirección">
                                <div class="float-left d-none d-sm-block">Dirección</div>
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
                                        <div class="float-left d-none d-sm-block">Nombre</div>
                                        <div class="text-muted" style="text-align: right;">{{ucwords($acudiente->nombre_acu_2)}}</div>
                                    </div>
                                @endif
                                @if (!empty($acudiente -> telefono_acu_2))
                                    <div class="card-footer r" title="Télefono">
                                        <div class="float-left d-none d-sm-block">Télefono</div>
                                        <div class="text-muted" style="text-align: right;">{{ucwords($acudiente->telefono_acu_2)}}</div>
                                    </div>
                                @endif
                                @if (!empty($acudiente -> direccion_acu_2))
                                    <div class="card-footer r" title="Dirección">
                                        <div class="float-left d-none d-sm-block">Dirección</div>
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

