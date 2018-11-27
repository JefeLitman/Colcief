@extends('contenedores.admin')
@section('titulo','Empleado Nuevo')
@section('contenedor_admin')
{{-- errores --}}
@include('error.error')
<div class="container">
    <h4 class="text-center">Editar Empleado</h4>
    <form enctype="multipart/form-data" action="{{route('empleados.update', $empleado->cedula)}}" method = "POST">
        @csrf
        @method("PUT")
        <div class="row">
            {{-- cedula --}}
            <div class="col-md-6">
                <label for="cedula"><strong><small style="color : #616161">Cedula:</small></strong></label>
                <div class="form-group mb-2">
                    <input type="number" class="form-control form-control-sm"  id="cedula" name="cedula" value="{{$empleado->cedula}}" placeholder="Cedula" value="@eachError('cedula', $errors) @endeachError">
                </div>
            </div>

            {{-- Rol --}}
            <div class="col-md-6">
                <label for="role"><strong><small style="color : #616161">Cargo:</small></strong></label>
                <div class="form-group mb-2">
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
                <label for="nombre"><strong><small style="color : #616161">Nombres:</small></strong></label>
                <div class="form-group mb-2">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombres" class="form-control form-control-sm" value="{{$empleado->nombre}}" value="@eachError('nombre', $errors)@endeachError">
                </div>
            </div>
            {{-- apellido --}}
            <div class="col-md-6">
                <label for="apellido"><strong><small style="color : #616161">Apellidos:</small></strong></label>
                <div class="form-group mb-2">
                    <input type="text" id="apellido" name="apellido" placeholder="Apellidos" class="form-control form-control-sm" value="{{$empleado->apellido}}"  value="@eachError('apellido', $errors)@endeachError">
                </div>
            </div>
        </div>
        <div class="row">
            {{-- correo --}}
            <div class="col-md-6">
                <label for="correo"><strong><small style="color : #616161">Correo:</small></strong></label>
                <div class="form-group mb-2">
                    <input type="email" id="correo" name="correo" placeholder="E-mail" class="form-control form-control-sm" value="{{$empleado->correo}}" value="@eachError('correo', $errors)@endeachError">
                </div>
            </div>
            {{-- direccion --}}
            <div class="col-md-6">
                <label for="direccion"><strong><small style="color : #616161">Dirección:</small></strong></label>
                <div class="form-group mb-2">
                    <input type="text" id="direccion" name="direccion" placeholder="Dirección" class="form-control form-control-sm" value="{{$empleado->direccion}}"  value="@eachError('direccion', $errors)@endeachError">
                </div>
            </div>
        </div>
        <div class="row">
            {{-- titulo --}}
            <div class="col-md-6">
                <label for="titulo"><strong><small style="color : #616161">Titulo:</small></strong></label>
                <div class="form-group mb-2">
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo" class="form-control form-control-sm" value="{{$empleado->titulo}}" value="@eachError('titulo', $errors)@endeachError">
                </div>
            </div>
            {{-- director --}}
            <div class="col-md-6">
                <label for="fk_curso"><strong><small style="color : #616161">Curso:</small></strong></label>
                <div class="form-group mb-2">
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
                <div class="form-group mb-2">
                {{-- Foto --}}
                    <label for="customFileLang"><strong><small style="color : #616161">Foto:</small></strong></label>
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input form-group" id="customFileLang" lang="es">
                        <label id="file" class="custom-file-label" for="customFileLang">Actualizar Foto</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" name="action" value="Enviar" class=" btn btn-info btn-block py-2 " style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
        </div>
    </form>
</div>
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
