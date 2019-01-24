@extends('contenedores.admin')
@section('titulo','Estudiante Nuevo')
@section('contenedor_admin')
{{-- mensajes de error --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="post" action="{{ route('estudiantes.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
                    <div class="card-header p-0">
                        <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
                            <h4><i class="fas fa-address-card"></i> Crear estudiante</h4>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        {{-- DATOS DEL ESTUDIANTE --}}
                        <h5 class="text-center">Datos del estudiante</h5>
                        <div class="row">
                            {{-- nombre --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Nombre</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-circle"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="nombre" class="form-control form-control-sm" value="@eachError('nombre', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                            {{-- apellido --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Apellido</small></strong></label>
                                    <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                        </div>
                                            <input type="text" name="apellido" class="form-control form-control-sm" value="@eachError('apellido', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- fecha --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Fecha de nacimiento</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" name="fecha_nacimiento" class="form-control form-control-sm" value="@eachError('fecha_nacimiento', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                            {{-- curso --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Curso</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class= "input-group-text">
                                                <i class="fas fa-user-cog"></i>
                                            </span>
                                        </div>
                                        <select class="custom-select custom-select-sm" name="fk_curso" id="fk_curso">
                                            <option value='' if>Seleccionar el grado</option>
                                            @foreach ($cursos as $c)
                                                <option value="{{$c->pk_curso}}">{{($c->prefijo==0)?"Preescolar":$c->prefijo}}-{{$c->sufijo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Discapacidad --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Discapacidad</small></strong></label>
                                    <div class="input-group mb-2 disabled">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-wheelchair"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" aria-label="Text input with radio button" placeholder="Discapacidad" disabled>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><input type="checkbox" name="discapacidad" value="1"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- foto --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Foto</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="height: calc(1.8125rem + 2px); font-size: .875rem;">
                                            <i class="fas fa-file-image input-group-text"></i>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input form-group" id="customFileLang" lang="es">
                                            <label id="file" class="custom-file-label" for="customFileLang">Foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- DATOS DEL ACUDIENTE 1 --}}
                        <h5 class="text-center">Datos del acudiente</h5>
                        <div class="row">
                            {{-- nombres --}}
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Nombres</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-circle"></i>
                                            </span>
                                        </div>
                                        <input type="text"  name="nombre_acu_1" class="form-control form-control-sm" value="@eachError('nombre_acu_1', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                            {{-- celular --}}
                            <div class="col-lg-4 col-md-6">
                                <div class="from-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Celular</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-mobile-alt"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="telefono_acu_1"  class="form-control form-control-sm" value="@eachError('telefono_acu_1', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                            {{-- Direccion --}}
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Dirección</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-marked-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="direccion_acu_1" class="form-control form-control-sm" value="@eachError('direccion_acu_1', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- <a class="btn btn-outline-success" data-toggle="collapse" data-target="#acudiente2">Agregar Acudiente</a> --}}
                        <button type="button" class="btn btn-outline-success btn-sm btn-block" data-toggle="collapse"  style="background-color:  #17a2b8 !important; border-color: #17a2b8 !important; color:white;" data-target="#acudiente2" onclick="$(this).remove()" style="@if(!is_null(old('nombre_acu_2')) || !is_null(old('direccion_acu_2')) || !is_null(old('telefono_acu_2'))) display:none @endif">¿Otro acudiente?</button>
                        <div class="collapse @if(!is_null(old('nombre_acu_2')) || !is_null(old('direccion_acu_2')) || !is_null(old('telefono_acu_2'))) show @endif" id="acudiente2">
                            {{-- DATOS DEL ACUDIENTE 2 --}}
                            <h5 class="text-center">Datos del acudiente 2</h5>
                            {{-- nombres --}}
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="cedula"><strong><small style="color : #616161">Nombres</small></strong></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-circle"></i>
                                                </span>
                                            </div>
                                            <input type="text"  name="nombre_acu_2"  class="form-control form-control-sm" value="@eachError('nombre_acu_2', $errors)@endeachError">
                                        </div>
                                    </div>
                                </div>
                                {{-- celular --}}
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="cedula"><strong><small style="color : #616161">Celular</small></strong></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                            </div>
                                            <input type="number" name="telefono_acu_2" class="form-control form-control-sm" value="@eachError('telefono_acu_2', $errors)@endeachError">
                                        </div>
                                    </div>
                                </div>
                                {{-- Direccion --}}
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label for="cedula"><strong><small style="color : #616161">Dirección</small></strong></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map-marked-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="direccion_acu_2" class="form-control form-control-sm" value="@eachError('direccion_acu_2', $errors)@endeachError">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- enviar --}}
                        <br>
                        <div class="text-center">
                            <input type="submit" name="action" value="Enviar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
