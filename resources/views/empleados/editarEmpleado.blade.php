@extends('contenedores.admin')
@section('titulo','Empleado Nuevo')
@section('contenedor_admin')
{{-- errores --}}
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <form enctype="multipart/form-data" action="{{route('empleados.update', $empleado->cedula)}}" method = "POST">
                @method('PUT')
                @csrf
                <div class="card border-primary rounded-0" style="border-color: #17a2b8 !important; border-radius:0.25rem !important;">
                    <div class="card-header p-0">
                        <div class="bg-info text-center py-2" style="background-color: rgba(0,0,0,.03) !important;">
                            <h4><i class="fas fa-user-tie"></i> Editar empleado</h4>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            {{-- cedula --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Cedula</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class= "input-group-text">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control form-control-sm"  id="cedula" name="cedula" value="{{$empleado->cedula}}" value="@eachError('cedula', $errors) @endeachError">
                                    </div>
                                </div>
                            </div>
                            {{-- Rol --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Seleciconar rol</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class= "input-group-text">
                                                <i class="fas fa-user-cog"></i>
                                            </span>
                                        </div>
                                        <select class="custom-select custom-select-sm" name="role" id="role" onchange="desactivar(this.id,'fk_curso')">
                                            @php
                                                $role=["Administrador","Director","Profesor","Coordinador"]
                                            @endphp
                                            @foreach ($role as $i=>$value)
                                                @if (intval($empleado->role)==$i)
                                                    <option value="{{$i}}" selected>{{$value}}</option>
                                                @else
                                                    <option value="{{$i}}">{{$value}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- nombre --}}
                            <div class="col-md-6">
                                <div class="form-goup mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Nombre</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                        </div>
                                        <input type="text" id="nombre" name="nombre" class="form-control form-control-sm"  value="{{$empleado->nombre}}" value="@eachError('nombre', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                            {{-- apellido --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Apellidos</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                        </div>
                                        <input type="text" id="apellido" name="apellido" class="form-control form-control-sm"  value="{{$empleado->apellido}}" value="@eachError('apellido', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- email --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Correo</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="email" id="email" name="email"  value="{{$empleado->email}}" class="form-control form-control-sm" value="@eachError('email', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                            {{-- direccion --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Dirección</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                        </div>
                                        <input type="text" id="direccion" name="direccion"  value="{{$empleado->direccion}}"class="form-control form-control-sm" value="@eachError('direccion', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- titulo --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Título</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class= "input-group-text">
                                                <i class="fas fa-user-graduate"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="titulo" name="titulo"  value="{{$empleado->titulo}}" class="form-control form-control-sm" value="@eachError('titulo', $errors)@endeachError">
                                    </div>
                                </div>
                            </div>
                            {{-- curso --}}
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Curso</small></strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <select id="fk_curso" name="fk_curso" {{($empleado->role=='0' or $empleado->role=='2')?"disabled":""}}  placeholder="Director" class="form-control form-control-sm" value="{{$empleado->director}}" value="@eachError ('director', $errors)@endeachError">
                                            <option value="">Seleccione el curso</option>
                                            @foreach ( $cursos as $c )
                                                <option value="{{$c->pk_curso}}" {{($empleado->fk_curso==$c->pk_curso)?"selected":""}}>{{($c->prefijo=="0")?"Preescolar":$c->prefijo}} - {{$c->sufijo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="cedula"><strong><small style="color : #616161">Foto</small></strong></label>
                                    <div class="input-group mb-2">
                                    {{-- Foto --}}
                                        <div class="input-group-prepend" style="height: calc(1.8125rem + 2px); font-size: .875rem;">
                                            <i class="fas fa-file-image input-group-text"></i>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input form-group" id="customFileLang" lang="es">
                                            <label id="file" class="custom-file-label" for="customFileLang">Actualizar Foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="action" value="Actualizar" class=" btn btn-success btn-block" style="background-color:  #17a2b8 !important; border-color:  #17a2b8 !important;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function desactivar(p1,p2){
        var s1 = document.getElementById(p1);
        var s2 = document.getElementById(p2);
        if(s1.value=='0' || s1.value=='2' || s1.value=='3'){
            s2.value="";
            s2.disabled = true;
        }else{
            s2.disabled = false;
        }
    }
</script>
@endsection
