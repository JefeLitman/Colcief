@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Editar de Materias - Profesor - Curso')
{{-- mensajes de error --}}
@include('error.error')

{{-- Guia Front --}}
{{-- Se envian un Objeto $materiapc --}}
{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaPCController.php  funcion edit()
     @Autor Paola C. --}}
{{-- Estado: Terminada para profesor --}}
{{-- URL: localhost:8000\materiaspc\{pk_materia_pc}\editar --}}
<br>
<div class="conatiner">
    <div class="row justify-content-center">
        <div class="col-10">
        <form method="post" action="{{route('materiaspc.update', $materiapc->pk_materia_pc)}}" >
            {{ method_field('PATCH') }}
            @csrf

            <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                        <h3><i class="fas fa-chalkboard-teacher"></i> Editar Materia - Profesor - Curso</h3>
                    </div>
                </div>

            <div class="card-body p-3">
                <div class="row">
                    {{--  Datos de la materia  --}}
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-book"></i>
                                </span>
                            </div>
                            <input type="text" disabled class="form-control form-control-sm"
                            name="fk_materia" id="fk_materia" value="{{$materiapc->materia}}">
                        </div>
                    </div>

                    {{--  Profesor  --}}
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user-tie"></i>
                                </span>
                            </div>
                            <input type="text" disabled class="form-control form-control-sm"
                            name="fk_empleado" id="fk_empleado" value="{{$materiapc->nombre}} {{$materiapc->apellido}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- curso --}}
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-pen"></i>
                                </span>
                            </div>
                            <input type="text" disabled class="form-control form-control-sm"
                            name="fk_curso" id="fk_curso" value="{{$materiapc->curso}}">
                        </div>
                    </div>
                    {{-- salon --}}
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </span>
                            </div>
                            <input type="text" placeholder="Salón (máx 5 caracteres)" disabled class="form-control form-control-sm" name="salon" id="salon" maxlength="5" value="{{$materiapc->salon}}" required>
                        </div>
                    </div>
                </div>
                    {{--  logros solo ver  --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
                                        <i class="fas fa-star"></i>
                                    </span>
                                </div>
                                <textarea class="form-control form-control-sm"  name="logros_custom" id="logros_custom" placeholder="Solo lo puede modificar los docentes">{{$materiapc->logros_custom}}</textarea>
                            </div>
                        </div>
                    </div>
                    {{-- Boton de enviar --}}
                    <div class="text-center">
                        <input type="submit" name="action" value="Actualizar" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
