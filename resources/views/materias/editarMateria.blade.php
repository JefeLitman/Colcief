@extends('contenedores.admin')
@section('titulo','Editar materia')
@section('contenedor_admin')
{{-- mensajes de error --}}

{{-- Guia Front --}}
{{-- Se envía el objeto $materia --}}
{{-- Variables enviadas desde Local>App>Http>Controllers>MateriaController.php  funcion edit()
	 @Autor Paola C. --}}
{{-- URL: localhost:8000\materias\{pk_materia}\editar --}}
<br>
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <form method="post" action="{{route('materias.update', $materia->pk_materia)}}" >
            {{ method_field('PATCH') }}
            @csrf
            <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
                        <h4><i class="fas fa-pencil-ruler"></i> Editar materia</h4>
                    </div>
                </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Nombre de la materia</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class= "input-group-text">
                                                <i class="fas fa-book-reader"></i>
                                            </span>
                                        </div>
                                    <input type="text" name="nombre" class="form-control form-control-sm" placeholder="Nombre de la materia"  value="{{ $materia["nombre"] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Contenido de la materia</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class= "input-group-text">
                                                <i class="fas fa-marker"></i>
                                            </span>
                                        </div>
                                        <textarea class="form-control form-control-sm" placeholder="Contenido de la materia" name="contenido" id="contenido" >{{ $materia["contenido"] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Logros de la materia</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class= "input-group-text">
                                                <i class="fas fa-star"></i>
                                            </span>
                                        </div>
                                        <textarea class="form-control form-control-sm" name="logros_custom" id="logros_custom" placeholder="Logros de la materia">{{ $materia["logros_custom"] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="action" value="Actualizar" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
