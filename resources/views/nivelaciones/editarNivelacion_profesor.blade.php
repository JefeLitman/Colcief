@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo','Nivelacion')

<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <form  action="{{route('nivelaciones.update', $nivelacion->pk_nivelacion)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
                    <div class="card-header p-0">
                        <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
                            <h4><i class="fas fa-address-card"></i> Nivelación - Editar</h4>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            {{-- tipo Periodo 1/ 2/ 3/ 4 --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Tipo</small></strong></label>
                                    <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-list-ul"></i></span>
                                    </div>
                                        <input type="text" class="form-control form-control-sm" value="Definitiva anual" disabled>
                                    </div>
                                </div>
                            </div>
                            {{-- Materia --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Materia</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" value="{{ucwords($nivelacion->materia)}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Profesor --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Fecha</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-circle"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" value="{{ucwords($nivelacion->nombre)}} {{ucwords($nivelacion->apellido)}}" disabled>
                                    </div>
                                </div>
                            </div>
                            {{-- Curso--}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cedula"><strong><small style="color : #616161">Curso</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class= "input-group-text">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" value="{{($nivelacion->prefijo==0)?'Preescolar':$nivelacion->prefijo}}-{{$nivelacion->sufijo}} / {{$nivelacion->ano}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            {{-- Estudiante --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Estudiante</small></strong></label>
                                    <div class="input-group mb-2 disabled">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user-graduate"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" value="{{ucwords($nivelacion->nombreE)}} {{ucwords($nivelacion->apellidoE)}}" disabled>
                                    </div>
                                </div>
                            </div>
                            {{-- Nota --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Nota (La maxima nota es 3.0)</small></strong></label>
                                    <div class="input-group mb-2 disabled">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-sticky-note"></i>
                                            </div>
                                        </div>
                                        <input required type="number" name="nota" id="nota" min="1" max="3" class="form-control form-control-sm" value="{{$nivelacion->nota}}" value="@eachError('nota', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                {{-- Fecha de presentacion --}}
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Fecha de presentacion (Debe ser una fecha entre {{$nivelacion->nivelacion_inicio}} y {{$nivelacion->nivelacion_limite}})</small></strong></label>
                                    <div class="input-group mb-2 disabled">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                        </div>
                                        <input required type="date" name="fecha_presentacion" id="fecha_presentacion" min="{{$nivelacion->nivelacion_inicio}}" max="{{$nivelacion->nivelacion_limite}}" class="form-control form-control-sm" value="{{$nivelacion->fecha_presentacion}}" value="@eachError('fecha_presentacion', $errors)@endeachError">
                                    </div>
                                </div>                                    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                {{-- Observaciones--}}
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Observaciones (No puede superar los 255 caracteres)</small></strong></label>
                                    <textarea required class="form-control" name="observaciones" id="observaciones" rows="3" maxlength="255" value="@eachError('observaciones', $errors)@endeachError">{{$nivelacion->observaciones}}</textarea>
                                </div>                                    
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            {{-- Enviar --}}
                            <input type="submit" name="action" value="Actualizar" class="btn btn-info btn-block rounded-0 py-2"></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection