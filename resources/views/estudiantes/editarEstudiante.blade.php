@extends('contenedores.admin')
@section('titulo','Editar estudiante')
@section('contenedor_admin')
<br>
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <form enctype="multipart/form-data" action="{{route('estudiantes.update', $estudiante->pk_estudiante)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
                    <div class="card-header p-0">
                        <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
                            <h4><i class="fas fa-address-card"></i> Editar estudiante</h4>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        {{-- DATOS DEL ESTUDIANTE --}}
                        <h5 class="text-center">Datos del estudiante</h5>
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
                                        <input type="text" name="nombre" placeholder="Nombre" class="form-control form-control-sm" value="{{$estudiante->nombre}}" value="@eachError('nombre', $errors)@endeachError">
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
                                        <input type="text" name="apellido" placeholder="Apellidos" class="form-control form-control-sm" value="{{$estudiante->apellido}}" value="@eachError('apellido', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- fecha --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Fecha</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" name="fecha_nacimiento" placeholder="dd/mm/yyyy" class="form-control form-control-sm" value="{{$estudiante->fecha_nacimiento}}" value="@eachError('fecha_nacimiento', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                            {{-- curso --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cedula"><strong><small style="color : #616161">Curso: (Ultimo aprovado
                                        @if ($estudiante->grado!=null)
                                            @php
                                                $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
                                            @endphp
                                            {{$g[$estudiante->grado]}}
                                        @else
                                            Ninguno
                                        @endif
                                        )</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class= "input-group-text">
                                                <i class="fas fa-user-cog"></i>
                                            </span>
                                        </div>
                                        <select class="custom-select custom-select-sm" name="fk_curso" id="fk_curso">
                                            <option value="" selected>Seleccionar el curso</option>
                                            @php $grado=["Preescolar","Primero","Segundo","Tercero","Cuarto","Quinto","Sexto","Septimo","Octavo","Noveno","Decimo","Once"]
                                            @endphp
                                            @foreach ($cursos as $c)
                                                    <option value="{{$c->pk_curso}}" {{($estudiante->fk_curso==$c->pk_curso)?"Selected":""}}>
                                                        {{($c->prefijo!=0)?$c->prefijo:"Preescolar"}}-{{$c->sufijo}}
                                                    </option>
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
                                        <input type="text" class="form-control form-control-sm" aria-label="Text input with radio button" placeholder="Discapacidad" disabled >
                                        <div class="input-group-append">
                                            <span class="input-group-text"><input type="checkbox" value="1" name="discapacidad" {{$estudiante->discapacidad == "1" ? 'checked' : ''}}
                                            ></span>
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
                                            <input type="file" name="foto" class="custom-file-input form-group" id="customFileLang" value="{{$estudiante->foto}}" lang="es">
                                            <label class="custom-file-label" for="customFileLang">Actualizar Foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    {{-- DATOS DEL ACUDIENTE 1 --}}
                        <h5 class="text-center">Datos del acudiente 1</h5>
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
                                        <input type="text"  name="nombre_acu_1" placeholder="Nombres" class="form-control form-control-sm" value="{{$acudiente->nombre_acu_1}}" value="@eachError('nombre_acu_1', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                            {{-- celular --}}
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label for="cedula"><strong><small style="color : #616161">Celular</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-mobile-alt"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="telefono_acu_1" placeholder="Celular" class="form-control form-control-sm" value="{{$acudiente->telefono_acu_1}}" value="@eachError('telefono_acu_1', $errors)@endeachError">
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
                                        <input type="text" name="direccion_acu_1" placeholder="Dirección" class="form-control form-control-sm" value="{{$acudiente->direccion_acu_1}}" value="@eachError('direccion_acu_1', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- DATOS DEL ACUDIENTE 2 --}}
                        <h5 class="text-center">Datos del acudiente 2</h5>
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
                                        <input type="text"  name="nombre_acu_2" placeholder="Nombres" class="form-control form-control-sm" value="{{$acudiente->nombre_acu_2}}" value="@eachError('nombre_acu_2', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                            {{-- celular --}}
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label for="cedula"><strong><small style="color : #616161">Celular</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-mobile-alt"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="telefono_acu_2" placeholder="Celular" class="form-control form-control-sm" value="{{$acudiente->telefono_acu_2}}" value="@eachError('telefono_acu_2', $errors)@endeachError">
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
                                        <input type="text" name="direccion_acu_2" placeholder="Dirección" class="form-control form-control-sm" value="{{$acudiente->direccion_acu_2}}" value="@eachError('direccion_acu_2', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- enviar --}}
                        <div class="text-center">
                            <input type="submit" name="action" value="Actualizar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
