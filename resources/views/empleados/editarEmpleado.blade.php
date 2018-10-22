@extends('contenedores.admin')
@section('titulo','Empleado Nuevo')
@section('contenedor_principal')
@guest
    @include('error.error')
@endguest
<br>
<div class="row justify-content-center">
    <div class="col-10">
        <form enctype="multipart/form-data" action="{{route('empleados.update', $empleado->cedula)}}" method = "POST">
        @csrf
        <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                        <h3><i class="fa fa-envelope"></i>Crear empleados</h3>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="form-group">
                        <div class="input-group mb-2">
                            {{-- cedula --}}
                            <div class="input-group-text">
                                <i class="material-icons">contacts</i>
                            </div>
                            <input type="number" class="form-control"  id="cedula" name="cedula" value="{{$empleado->cedula}}">
                        </div>

                        <div class="input-group mb-2">
                        {{-- nombre --}}
                            <div class="input-group-text">
                                <i class="material-icons">face</i>
                            </div>
                            <input type="text" id="nombre" name="nombre" value="{{$empleado->nombre}}" class="form-control">
                        {{-- apellido --}}
                             &nbsp &nbsp <div class="input-group-text">
                                <i class="material-icons">face</i>
                            </div>
                            <input type="text" id="apellido" name="apellido" value="{{$empleado->apellido}}" class="form-control">
                        </div>

                        <div class="input-group mb-2">
                        {{-- Correo --}}
                            <div class="input-group-text">
                                <i class="material-icons">mail</i>
                            </div>
                            <input type="email" id="correo" name="correo" value="{{$empleado->correo}}" class="form-control">
                        {{-- Direccion --}}
                            &nbsp &nbsp <div class="input-group-text">
                                <i class="material-icons">location_on</i>
                            </div>
                            <input type="text" id="direccion" name="direccion" value="{{$empleado->direccion}}" class="form-control">
                        </div>

                        <div class="input-group mb-2">
                        {{-- Titulo --}}
                            <div class="input-group-text">
                                <i class="material-icons">school</i>
                            </div>
                            <input type="text" id="titulo" name="titulo" value="{{$empleado->titulo}}" class="form-control">
                        {{-- Tiempo extra --}}
                             &nbsp &nbsp <div class="input-group-text">
                                <i class="material-icons">access_time</i>
                            </div>
                            <input type="number" id="tiempo_extra" name="tiempo_extra" value="{{$empleado->tiempo_extra}}" class="form-control">
                        {{-- Director --}}
                            &nbsp &nbsp <div class="input-group-text">
                                <i class="material-icons">work</i>
                            </div>
                            <input type="text" id="director" name="director" value="{{$empleado->director}}" class="form-control">
                        </div>

                        <div class="input-group mb-2">
                        {{-- Rol --}}
                            <div class="input-group-text">
                                <i class="material-icons">supervisor_account</i>
                            </div>
                            <select class="custom-select" name="role">
                                <option selected>Seleccionar el rol</option>
                                @php
                                    $role=["Profesor","Administrador"]
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

                        <div class="input-group mb-2">
                        {{-- Foto --}}
                        <div class="input-group-text">
                            <i class="material-icons">add_photo_alternate</i>
                        </div>
                        &nbsp &nbsp <input type="file" id="foto" name="foto" value="{{$empleado->foto}}" accept="image/png, image/jpeg, image/gif">&nbsp &nbsp
                        </div>
                        {{-- enviar --}}
                        <div class="text-center">
                            <input type="submit" name="action" value="Actualizar" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<br>
@endsection
