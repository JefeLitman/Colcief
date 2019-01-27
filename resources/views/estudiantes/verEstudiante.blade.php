@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo','Ver estudiante')
	{{-- d-none d-sm-blockuia Front --}}
	{{-- Se envía el objeto $estudiante y el objeto $acudiente --}}
	{{-- Variables enviadas desde Local>App>Http>Controllers>EstudianteController.php  funcion show()
		 @Autor Paola C. --}}
    {{-- URL: localhost:8000\estudiantes\{pk_estudiante} --}}
    {{-- <h3>Tipo de Archivos:</h3> $estudiante: {{ d-none d-sm-blockettype($estudiante)}}, $acudiente: {{ d-none d-sm-blockettype($acudiente)}} <br>
	<h3>Contenido estudiante:</h3> {{$estudiante}} <br>
	<h3>Contenido acudiente:</h3> {{$acudiente}} <br>
    <h1>Ejemplos</h1> --}}
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-12 col-lg-10 col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{$estudiante->foto}}" alt="Card image cap">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <small class="text-muted">Código:</small>
                                <div>{{ucwords($estudiante->pk_estudiante)}}</div>
                            </li>
                            <li class="list-group-item">
                                <small class="text-muted">Nombre:</small>
                                <div>{{ucwords($estudiante->nombre)}}</div>
                            </li>
                            <li class="list-group-item">
                                <small class="text-muted">Apellido:</small>
                                <div>{{ucwords($estudiante->apellido)}}</div>
                            </li>
                            <li class="list-group-item">
                                <small class="text-muted">Fecha de Nacimiento:</small>
                                <div>{{$estudiante->fecha_nacimiento}}</div>
                            </li>
                            <li class="list-group-item">
                                <small class="text-muted">Discapacidad:</small>
                                <div>{{ucwords($estudiante->discapacidad == 0 ? 'no' : 'si' )}}</div>
                            </li>
                            @unless (is_null($estudiante -> deleted_at))
                                <li class="list-group-item" title="Estado">
                                    <small class="text-muted">Estado:</small>
                                    <div>Eliminado</div>
                                </li>
                            @endunless
                            
                        </ul>
                    </div>
                </div>
                <br>
                <div class="col-sm-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            Acciones
                        </div>
                        <ul class="list-group list-group-flush">
                            @if (!empty($curso))
                                <li class="list-group-item">
                                    <a href="/estudiantes/cursos/{{$curso -> pk_curso}}">
                                        <small class="text-muted">Curso:</small>
                                        <div><span class="badge badge-pill badge-info">{{ucwords($curso -> prefijo.'-'.$curso -> sufijo)}}</span></div>
                                        {{-- <small class="text-muted">Curso:</small>
                                        <div"><span class="badge badge-pill badge-info">{{ucwords($curso -> prefijo.'-'.$curso -> sufijo)}}</span></div> --}}
                                    </a>
                                </li>
                            @endif
                            @if (session('role') == 'administrador')
                                <li class="list-group-item" title="Acciones">
                                    <div>
                                        <a href="/boletines/actual/estudiantes/{{$estudiante->pk_estudiante}}" title="Ver notas" class="{{is_null($estudiante -> deleted_at) ? 'text-info' : 'text-secondary'}}"><i class="fas fa-clipboard-list"></i></a>
                                        <a href="{{ route('estudiantes.edit', $estudiante->pk_estudiante) }}" title="Editar" class="{{is_null($estudiante -> deleted_at) ? 'text-info' : 'text-secondary'}}"><i  class="fas fa-edit"></i></a>
                                        <a ruta="estudiantes" class="{{is_null($estudiante->deleted_at) ? '' : 'restore'}}" direccion="/estudiantes/{{$estudiante->pk_estudiante}}" identificador="{{$estudiante->pk_estudiante}}" ><i class="fas fa-recycle {{is_null($estudiante->deleted_at) ? 'text-secondary' : 'text-success'}}" title="Restaurar"></i>
                                        </a>
                                        <a class="delete {{is_null($estudiante -> deleted_at) ? 'text-danger' : 'text-secondary'}}" direccion="/estudiantes/{{$estudiante->pk_estudiante}}" padre="null" ruta="estudiantes" identificador="{{$estudiante->pk_estudiante}}"><i title="Eliminar" class="fas fa-trash-alt"></i></a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    @if (!empty($acudiente))
                        <div class="card mb-3">
                            <div class="card-header">
                                Acudiente #1 
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" title="Nombre">
                                    <small class="text-muted">Nombre:</small>
                                    <div>{{ucwords($acudiente->nombre_acu_1)}}</div>
                                </li>
                                <li class="list-group-item" title="Télefono">
                                    <small class="text-muted">Télefono:</small>
                                    <div>{{ucwords($acudiente->telefono_acu_1)}}</div>
                                </li>
                                <li class="list-group-item" title="Dirección">
                                    <small class="text-muted">Dirección:</small>
                                    <div>{{ucwords($acudiente->direccion_acu_1)}}</div>
                                </li>
                            </ul>
                        </div>
                        @unless (empty($acudiente -> nombre_acu_2) && empty($acudiente -> telefono_acu_2) && empty($acudiente -> direccion_acu_2))
                            <div class="card">
                                <div class="card-header">
                                    Acudiente #2 
                                </div>
                                <ul class="list-group list-group-flush">
                                    @if (!empty($acudiente -> nombre_acu_2))
                                        <li class="list-group-item" title="Nombre">
                                            <small class="text-muted">Nombre:</small>
                                            <div>{{ucwords($acudiente->nombre_acu_2)}}</div>
                                        </li>
                                    @endif
                                    @if (!empty($acudiente -> telefono_acu_2))
                                        <li class="list-group-item" title="Télefono">
                                            <small class="text-muted">Télefono:</small>
                                            <div>{{ucwords($acudiente->telefono_acu_2)}}</div>
                                        </li>
                                    @endif
                                    @if (!empty($acudiente -> direccion_acu_2))
                                        <li class="list-group-item" title="Dirección">
                                            <small class="text-muted">Dirección:</small>
                                            <div>{{ucwords($acudiente->direccion_acu_2)}}</div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endunless
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

