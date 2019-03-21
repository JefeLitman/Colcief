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
                <div class="col-sm-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            Acciones
                        </div>
                        <ul class="list-group list-group-flush">
                            @if (session('role') != 'estudiante')
                                @if (!empty($curso))
                                    <li class="list-group-item">
                                        <a href="/estudiantes/cursos/{{$curso -> pk_curso}}">
                                            <small class="text-muted">Curso:</small>
                                            <div><span class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="Ver curso {{ucwords($curso -> prefijo.'-'.$curso -> sufijo)}}">{{ucwords($curso -> prefijo.'-'.$curso -> sufijo)}}</span></div>
                                        </a>
                                    </li>
                                @endif
                            @endif
                            @if (session('role') == 'administrador')
                                <li class="list-group-item">
                                    @if (is_null($estudiante->deleted_at))
                                        <a data-toggle="tooltip" data-placement="top" title="Descargar Boletin" href="/boletines/actual/estudiantes/{{$estudiante->pk_estudiante}}/pdf">
                                            <i class="far fa-file-pdf" style="color:#00838f"></i>
                                        </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Ver notas" href="/boletines/actual/estudiantes/{{$estudiante->pk_estudiante}}" class="text-info">
                                            <i class="fas fa-clipboard-list"></i>
                                        </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('estudiantes.edit', $estudiante->pk_estudiante) }}" class="text-info">
                                            <i  class="fas fa-edit"></i>
                                        </a>
                                        <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="delete text-danger" direccion="/estudiantes/{{$estudiante->pk_estudiante}}" padre="null" ruta="estudiantes" identificador="{{$estudiante->pk_estudiante}}">
                                            <i title="Eliminar" class="fas fa-trash-alt"></i>
                                        </a>
                                    @else
                                        <a data-toggle="tooltip" data-placement="top" title="Restaurar" ruta="estudiantes" class="restore text-success" direccion="/estudiantes/{{$estudiante->pk_estudiante}}" identificador="{{$estudiante->pk_estudiante}}">
                                            <i class="fas fa-recycle"></i>
                                        </a>
                                    @endif
                                </li>
                            @endif
                            @if (session('role') == 'estudiante')
                                @if (session('user')['pk_estudiante'] == $estudiante->pk_estudiante)
                                    <li class="list-group-item">
                                        <a data-toggle="modal" data-target="#estudianteModal">
                                            <i data-toggle="tooltip" data-placement="top" title="Cambiar contraseña" class="fas fa-unlock-alt"></i>
                                        </a>
                                        <a data-toggle="modal" data-target="#empleadoModal">
                                            <i data-toggle="tooltip" data-placement="top" title="Cambiar foto" class="fas fa-user-cog text-info"></i>
                                        </a>
                                    </li>
                                @endif
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
<div class="modal fade" id="empleadoModal" tabindex="-1" role="dialog" aria-labelledby="empleadoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="empleadoModalLabel">Imagen de Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="formulario" enctype="multipart/form-data" action="{{url('/estudiantes/perfil')}}" method="POST">
                    @csrf
                    @method("POST")
                    <img class="rounded mx-auto d-block w-75" src="{{session('user')['foto']}}" alt="Card image cap"><br>
                    {{-- foto --}}
                    <div class="col-md-12">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="height: calc(1.8125rem + 2px); font-size: .875rem;">
                                <i class="fas fa-file-image input-group-text"></i>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input form-group" id="customFileLang"  lang="es">
                                <label class="custom-file-label" for="customFileLang">Actualizar Foto</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="formulario" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="estudianteModal" tabindex="-1" role="dialog" aria-labelledby="estudianteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="estudianteModalLabel">Imagen de Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('estudiantes.password') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf
                    <div class="row" style="text-align: left !important">
                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label for="actual" style="{{ ($errors->has('actual')) ? 'color: #c4183c' : '' }}">Contraseña actual</label>
                                <div class="input-group input-group-seamless">
                                    <span class="input-group-prepend ">
                                        <span class="input-group-text ">
                                            <i class="fa fa-lock" style="{{ ($errors->has('actual')) ? 'color: #c4183c' : '' }}"></i>
                                        </span>
                                    </span>
                                    <input id="actual" type="password" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" name="actual" required>
                                </div>
                                @if ($errors->has('actual'))
                                    <span class="invalid-feedback" style="display: block" role="alert">
                                        <strong>{{ $errors->first('actual') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label for="password" style="{{ ($errors->has('password')) ? 'color: #c4183c' : '' }}">Contraseña nueva</label>
                                <div class="input-group input-group-seamless">
                                    <span class="input-group-prepend ">
                                        <span class="input-group-text ">
                                            <i class="fa fa-lock" style="{{ ($errors->has('password')) ? 'color: #c4183c' : '' }}"></i>
                                        </span>
                                    </span>
                                    <input id="password" type="password" class="form-control form-control-sm {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label for="password-confirm">Confirmar contraseña</label>
                                <div class="input-group input-group-seamless">
                                    <span class="input-group-prepend ">
                                        <span class="input-group-text ">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                    <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-success btn-pill d-flex ml-auto mr-auto" type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

