@extends('contenedores.admin')
@section('titulo','Editar estudiante')
@section('contenedor_admin')
@include('error.error')
{{-- //////////////// --}}
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <form enctype="multipart/form-data" action="{{route('estudiantes.update', $estudiante->pk_estudiante)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                        <h3><i class="fas fa-address-card"></i> Crear estudiante</h3>
                    </div>
                </div>
                <div class="card-body p-3">
                    {{-- DATOS DEL ESTUDIANTE --}}
                    <h4 class="text-center">Datos del estudiante</h4>
                    {{-- foto --}}
                    {{-- <div class="row">
                        <div class="col-md-12 text-center">
                            <figure class="figure">
                                <img src="{{$estudiante->foto}}" class="figure-img img-fluid rounded" style="width:40%">
                            </figure>
                        </div>
                    </div> --}}
                    {{-- boton de la foto --}}
                    {{-- <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-success">Nueva foto</button>
                        </div>
                    </div> --}}
                    <br>
                    <div class="row">
                        {{-- nombre --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user-circle"></i>
                                    </span>
                                </div>
                                <input type="text" name="nombre" placeholder="Nombre" class="form-control" value="{{$estudiante->nombre}}" value="@eachError('nombre', $errors)@endeachError">
                            </div>
                        </div>
                        {{-- apellido --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <input type="text" name="apellido" placeholder="Apellidos" class="form-control" value="{{$estudiante->apellido}}" value="@eachError('apellido', $errors)@endeachError">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- fecha --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="date" name="fecha_nacimiento" placeholder="dd/mm/yyyy" class="form-control" value="{{$estudiante->fecha_nacimiento}}" value="@eachError('fecha_nacimiento', $errors)@endeachError">
                            </div>
                        </div>
                        {{-- grado --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
                                        <i class="fas fa-user-cog"></i>
                                    </span>
                                </div>
                                <select class="custom-select" name="grado" id="grado">
                                    <option selected>Seleccionar el grado</option>
                                    @php $grado=["Preescolar","Primero","Segundo","Tercero","Cuarto","Quinto","Sexto","Septimo","Octavo","Noveno","Decimo","Once"]
                                    @endphp
                                    @foreach ($grado as $i=>$value)
                                      @if (intval($estudiante->grado)==$i)
                                          <option value="{{$i}}" selected>{{$value}}</option>
                                      @else
                                          <option value="{{$i}}">{{$value}}</option>
                                      @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Discapacidad --}}
                        <div class="col-md-6">
                                <div class="input-group mb-2 disabled">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-wheelchair"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" aria-label="Text input with radio button" placeholder="Discapacidad" disabled >
                                    <div class="input-group-append">
                                        <span class="input-group-text"><input type="checkbox"
                                            @if($estudiante->discapacidad == "1") {{-- verifico si el estudiante tiene discapacidad, en caso q si, imprimo checked para checkar el checkbox --}}
                                                checked value="1"
                                            @endif
                                        ></span>
                                    </div>
                                </div>
                            </div>
                        {{-- foto --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend" style="height: calc(1.8125rem + 2px); font-size: .875rem;">
                                    <i class="fas fa-file-image input-group-text"></i>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="foto" class="custom-file-input form-group" id="customFileLang" value="{{$estudiante->foto}}" lang="es">
                                    <label class="custom-file-label" for="customFileLang">Actualizar Foto</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                {{-- DATOS DEL ACUDIENTE 1 --}}
                    <h4 class="text-center">Datos del acudiente 1</h4>
                    {{-- nombres --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user-circle"></i>
                                    </span>
                                </div>
                                <input type="text"  name="nombre_acu_1" placeholder="Nombres" class="form-control" value="{{$acudiente->nombre_acu_1}}" value="@eachError('nombre_acu_1', $errors)@endeachError">
                            </div>
                        </div>
                    {{-- Direccion --}}
                        <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="direccion_acu_1" placeholder="Dirección" class="form-control" value="{{$acudiente->direccion_acu_1}}" value="@eachError('direccion_acu_1', $errors)@endeachError">
                            </div>
                        </div>
                    {{-- celular --}}
                            <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-mobile-alt"></i>
                                    </span>
                                </div>
                                <input type="number" name="telefono_acu_1" placeholder="Celular" class="form-control" value="{{$acudiente->telefono_acu_1}}" value="@eachError('telefono_acu_1', $errors)@endeachError">
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- DATOS DEL ACUDIENTE 2 --}}
                    <h4 class="text-center">Datos del acudiente 2</h4>
                    {{-- nombres --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user-circle"></i>
                                    </span>
                                </div>
                                <input type="text"  name="nombre_acu_2" placeholder="Nombres" class="form-control" value="{{$acudiente->nombre_acu_2}}" value="@eachError('nombre_acu_2', $errors)@endeachError">
                            </div>
                        </div>
                    {{-- Direccion --}}
                        <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="direccion_acu_2" placeholder="Dirección" class="form-control" value="{{$acudiente->direccion_acu_2}}" value="@eachError('direccion_acu_2', $errors)@endeachError">
                            </div>
                        </div>
                    {{-- celular --}}
                            <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-mobile-alt"></i>
                                    </span>
                                </div>
                                <input type="number" name="telefono_acu_2" placeholder="Celular" class="form-control" value="{{$acudiente->telefono_acu_2}}" value="@eachError('telefono_acu_2', $errors)@endeachError">
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- enviar --}}
                    <div class="text-center">
                        <input type="submit" name="action" value="Actualizar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- /////////////// --}}
        {{-- <div class="card green lighten-5">
            <div class="card-content">
					<form enctype="multipart/form-data" action="{{route('estudiantes.update', $estudiante->pk_estudiante)}}" method="POST">
					@csrf
					@method("PUT")
                    <h4 class="center">Datos Estudiante</h4>
                    <div class="divider"></div>

					<div class="row">
						<div class="input-field col s12">
							<img class="responsive-img" style="max-width:400px;" src="{{$estudiante->foto}}">
                        </div>
                        <div class="input-field col s12">
                            <a class="btn waves-effect waves-teal ">
                                <i class="material-icons" onclick="$('#modal2').modal('open');">add_a_photo</i>
                            </a>
                        </div>
                    </div>


                     <!-- Modal Structure -->
                    <div id="modal2" class="modal open">
                        <div class="modal-content">
                            <h4>Cargar Imagen</h4>
                            <div class="file-field input-field">
                                    <div class="btn cyan darken-3 waves-effect">
                                        <span>Seleccionar</span>
                                        <input type="file" name="foto">
                                    </div>
                                    <div class="file-path-wrapper">{{-- file-path-wrapper es para mostrar el nombre la foto que subio y verificar que subio --}}
                                        {{-- <input class="file-path validate" type="text">
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Descartar</a>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Subir</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" name="nombre" value="{{$estudiante->nombre}}" required   >
                            <label>Nombres <label class="rojo">*</label> </label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="apellido" value="{{$estudiante->apellido}}" required    >
                            <label>Apellido <label class="rojo">*</label> </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" name="fecha_nacimiento" class="datepicker" id="datepicker" value="{{$estudiante->fecha_nacimiento}}" required     >
                            <label>Fecha de nacimiento <label class="rojo">*</label></label>
                        </div>

                        <div class="input-field col s4">

                            <select name="grado" required    >
							  <option value=""  >Seleccionar</option>
							  @php $grado=["Preescolar","Primero","Segundo","Tercero","Cuarto","Quinto","Sexto","Septimo","Octavo","Noveno","Decimo","Once"]
							  @endphp
							  @foreach ($grado as $i=>$value)
								@if (intval($estudiante->grado)==$i)
									<option value="{{$i}}" selected>{{$value}}</option>
								@else
									<option value="{{$i}}">{{$value}}</option>
								@endif
							  @endforeach
                            </select>
                            <label>Grado <label class="rojo">*</label></label>
                        </div>
                        <div class="input-field col s4">
                            <label>
								<input type="checkbox" name="discapacidad"
								@if($estudiante->discapacidad == "1")
									checked value="1"
								@endif
								>
                                <span>Discapacidad</span>
                            </label>
                        </div>
                    </div>
                    <h4 class="center">Datos Acudiente 1</h4>
                    <div class="divider"></div>
                    <div class="row">
                            <div class="input-field col s4">
                                <input type="text" name="nombre_acu_1" value="{{$acudiente->nombre_acu_1}}" required    >
                                <label>Nombres <label class="rojo">*</label></label>
                            </div>
                            <div class="input-field col s4">
                                <input type="text" name="direccion_acu_1" value="{{$acudiente->direccion_acu_1}}" required    >
                                <label>Dirección <label class="rojo">*</label> </label>
                            </div>
                            <div class="input-field col s4">
                                <input type="number" name="telefono_acu_1" value="{{$acudiente->telefono_acu_1}}" required    >
                                <label>Celular <label class="rojo">*</label> </label>
                            </div>

                    </div>
                    <h4 class="center">Datos Acudiente 2</h4>
                    <div class="divider"></div>
                    <div class="row">
                            <div class="input-field col s4">
                                <input type="text" name="nombre_acu_2" value="{{$acudiente->nombre_acu_2}}"  >
                                <label>Nombres: </label>
                            </div>
                            <div class="input-field col s4">
                                <input type="text" name="direccion_acu_2" value="{{$acudiente->direccion_acu_2}}"     >
                                <label>Dirección: </label>
                            </div>
                            <div class="input-field col s4">
                                <input type="number" name="telefono_acu_2" value="{{$acudiente->telefono_acu_2}}"    >
                                <label>Celular: </label>
                            </div>

                    </div>
                    <div class="input-field center">
                        <button class="btn waves-effect cyan darken-3" type="submit" name="action">Enviar<i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection
