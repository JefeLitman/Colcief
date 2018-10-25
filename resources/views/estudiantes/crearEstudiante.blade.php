@extends('contenedores.admin')
@section('titulo','Estudiante Nuevo')
@section('contenedor_admin')
{{-- mensajes de error --}}
@include('error.error')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <form method="post" action="{{ route('estudiantes.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                    <div class="card-header p-0">
                        <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                            <h3><i class="fas fa-address-card"></i> Crear estudiante</h3>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        {{-- DATOS DEL ESTUDIANTE --}}
                        <h4 class="text-center">Datos del estudiante</h4>
                        <div class="row">
                            {{-- nombre --}}
                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user-circle"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="nombre" placeholder="Nombre" class="form-control" value="@eachError('nombre', $errors)@endeachError">
                                </div>
                            </div>
                            {{-- apellido --}}
                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <input type="text" name="apellido" placeholder="Apellidos" class="form-control" value="@eachError('apellido', $errors)@endeachError">
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
                                    <input type="date" name="fecha_nacimiento" placeholder="dd/mm/yyyy" class="form-control" value="@eachError('fecha_nacimiento', $errors)@endeachError">
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
                                        <option if>Seleccionar el grado</option>
                                        <option @select('grado', '0') @endselect value="0">Preescolar</option>
                                        <option @select('grado', '1') @endselect value="1">Primero</option>
                                        <option @select('grado', '2') @endselect value="2">Segundo</option>
                                        <option @select('grado', '3') @endselect value="3">Tercero</option>
                                        <option @select('grado', '4') @endselect value="4">Cuarto</option>
                                        <option @select('grado', '5') @endselect value="5">Quinto</option>
                                        <option @select('grado', '6') @endselect value="6">Sexto</option>
                                        <option @select('grado', '7') @endselect value="7">Septimo</option>
                                        <option @select('grado', '8') @endselect value="8">Octavo</option>
                                        <option @select('grado', '9') @endselect value="9">Noveno</option>
                                        <option @select('grado', '10') @endselect value="10">Decimo</option>
                                        <option @select('grado', '11') @endselect value="11">Once</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Discapacidad --}}
                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="discapacidad" value="1" aria-label="Radio button for following text input">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Discapacidad">
                                </div>
                            </div>
                            {{-- foto --}}
                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <i class="fas fa-file-image input-group-text"></i>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input form-group" id="customFileLang" lang="es">
                                        <label class="custom-file-label" for="customFileLang">Sube una foto</label>
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
                                    <input type="text"  name="nombre_acu_1" placeholder="Nombres" class="form-control" value="@eachError('nombre_acu_1', $errors)@endeachError">
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
                                    <input type="text" name="direccion_acu_1" placeholder="Dirección" class="form-control" value="@eachError('direccion_acu_1', $errors)@endeachError">
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
                                    <input type="number" name="telefono_acu_1" placeholder="Celular" class="form-control" value="@eachError('telefono_acu_1', $errors)@endeachError">
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
                                    <input type="text"  name="nombre_acu_2" placeholder="Nombres" class="form-control" value="@eachError('nombre_acu_2', $errors)@endeachError">
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
                                    <input type="text" name="direccion_acu_2" placeholder="Dirección" class="form-control" value="@eachError('direccion_acu_2', $errors)@endeachError">
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
                                    <input type="number" name="telefono_acu_2" placeholder="Celular" class="form-control" value="@eachError('telefono_acu_2', $errors)@endeachError">
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- enviar --}}
                        <div class="text-center">
                            <input type="submit" name="action" value="Enviar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
@endsection
