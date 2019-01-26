@extends('contenedores.admin')
@section('titulo','Modificar Fechas')
@section('contenedor_admin')

<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <form action="{{route('fechas.update')}}" method="post">
                <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
                    <div class="card-header p-0">
                        <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
                            <h4><i class="far fa-calendar-alt"></i> Modificar fechas escolares</h4>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Inicio Escolar</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" name="inicio_escolar" placeholder="{{$fecha->inicio_escolar}}" class="form-control form-control-sm" value="{{$fecha->inicio_escolar}}" value="@eachError('inicio_escolar', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Fin Escolar</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" name="fin_escolar" placeholder="{{$fecha->fin_escolar}}" class="form-control form-control-sm" value="{{$fecha->fin_escolar}}" value="@eachError('fin_escolar', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="text-center mt-3">
                            <input type="submit" name="action" value="Actualizar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;">
                        </div>  
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
