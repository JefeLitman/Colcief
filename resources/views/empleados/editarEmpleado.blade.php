@extends('contenedores.admin')
@section('titulo','Empleado Nuevo')
@section('contenedor_admin')
{{-- errores --}}
@include('error.error')
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <form enctype="multipart/form-data" action="{{route('empleados.update', $empleado->cedula)}}" method = "POST">
            @csrf
            @method("PUT")
            <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                        <h3><i class="fas fa-user-tie"></i> Editar empleado</h3>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        {{-- cedula --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                </div>
                                <input type="number" class="form-control form-control-sm"  id="cedula" name="cedula" value="{{$empleado->cedula}}" placeholder="Cedula" value="@eachError('cedula', $errors) @endeachError">
                            </div>
                        </div>

                        {{-- Rol --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
                                        <i class="fas fa-user-cog"></i>
                                    </span>
                                </div>
                                <select class="custom-select custom-select-sm" name="role" id="role" onchange="desactivar(this.id,'fk_curso')">
                                    @php
                                        $role=["Administrador","Director","Profesor"]
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
                    <div class="row">
                        {{-- nombre --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <input type="text" id="nombre" name="nombre" placeholder="Nombres" class="form-control form-control-sm" value="{{$empleado->nombre}}" value="@eachError('nombre', $errors)@endeachError">
                            </div>
                        </div>
                        {{-- apellido --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <input type="text" id="apellido" name="apellido" placeholder="Apellidos" class="form-control form-control-sm" value="{{$empleado->apellido}}"  value="@eachError('apellido', $errors)@endeachError">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- correo --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="email" id="correo" name="correo" placeholder="E-mail" class="form-control form-control-sm" value="{{$empleado->correo}}" value="@eachError('correo', $errors)@endeachError">
                            </div>
                        </div>
                        {{-- direccion --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                </div>
                                <input type="text" id="direccion" name="direccion" placeholder="Dirección" class="form-control form-control-sm" value="{{$empleado->direccion}}"  value="@eachError('direccion', $errors)@endeachError">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- titulo --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
                                        <i class="fas fa-user-graduate"></i>
                                    </span>
                                </div>
                                <input type="text" id="titulo" name="titulo" placeholder="Titulo" class="form-control form-control-sm" value="{{$empleado->titulo}}" value="@eachError('titulo', $errors)@endeachError">
                            </div>
                        </div>
                        {{-- director --}}
                        <div class="col-md-6">
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
                    <div class="row">
                        <div class="col-md-12">
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
                    <div class="text-center">
                        <input type="submit" name="action" value="Enviar" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<br>
<script>
    function desactivar(p1,p2){
        var s1 = document.getElementById(p1);
        var s2 = document.getElementById(p2);
        if(s1.value=='0' || s1.value=='2'){
            s2.value="";
            s2.disabled = true;
        }else{
            s2.disabled = false;
        }
    }
</script>
@endsection
