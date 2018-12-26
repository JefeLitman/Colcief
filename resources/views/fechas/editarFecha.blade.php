@extends('contenedores.admin')
@section('titulo','Modificar Fechas')
@section('contenedor_admin')

<div class="container">
    <div class="text-center py-2">
        <h4><i class="far fa-calendar-alt"></i> Modificar fechas escolares</h4>
    </div>
    <form action="{{route('fechas.update')}}" method="post">
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
    </form>    
</div>

@endsection
