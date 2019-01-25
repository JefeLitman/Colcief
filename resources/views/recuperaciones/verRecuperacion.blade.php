@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo','Recuperacio-Periodo '.$recuperacion->nro_periodo)

<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
                <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
                    <div class="card-header p-0">
                        <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
                            <h4><i class="fas fa-address-card"></i> Nivelacion </h4>
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
                                        <input type="text"  class="form-control form-control-sm" value="Periodo Nro {{$recuperacion->nro_periodo}}" disabled>
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
                                        <input type="text" class="form-control form-control-sm" value="{{ucwords($recuperacion->materia)}}" disabled>
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
                                        <input type="text" class="form-control form-control-sm" value="{{ucwords($recuperacion->nombre)}} {{ucwords($recuperacion->apellido)}}" disabled>
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
                                        <input type="text" class="form-control form-control-sm" value="{{($recuperacion->prefijo==0)?'Preescolar':$recuperacion->prefijo}}-{{$recuperacion->sufijo}} / {{$recuperacion->ano}}" disabled>
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
                                        <input type="text" class="form-control form-control-sm" value="{{ucwords($recuperacion->nombreE)}} {{ucwords($recuperacion->apellidoE)}}" disabled>
                                    </div>
                                </div>
                            </div>
                            {{-- Nota --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Nota</small></strong></label>
                                    <div class="input-group mb-2 disabled">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-sticky-note"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" value="{{$recuperacion->nota or '-'}} " disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                {{-- Fecha de presentacion --}}
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Fecha de presentacion</small></strong></label>
                                    <div class="input-group mb-2 disabled">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                        </div>
                                        <input type="date" class="form-control form-control-sm" value="{{$recuperacion->fecha_presentacion}}" disabled>
                                    </div>
                                </div>                                    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Observaviones</small></strong></label>
                                    <textarea class="form-control" rows="3"  disabled>{{$recuperacion->observaciones or "No hay observaciones aún."}}</textarea>
                                </div>                                    
                            </div>
                        </div>
                        @if (session('role')=='profesor' or session('role')=='director')
                            {{-- editar --}}
                            <br>
                            <div class="text-center">
                                <a href="/recuperaciones/{{$recuperacion->pk_recuperacion}}/editar"><input type="buttom" name="action" value="Editar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;"></a>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection