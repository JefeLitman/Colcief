@extends('contenedores.admin')
@section('contenedor_principal')
@section('titulo','Lista Empleados')
<div class="container">
    <div class="row center">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <br>
        <br>
        <div class="col-md-12">
            <form action="" id="autocompletar">
                <div class="input-group mb-3">
                    @csrf
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1" style="background-color:#00acc1;"><i class="material-icons prefix" style="color:white;">textsms</i></span>
                    </div>
                    <input type="text" class="form-control"  id="autocomplete-input" class="autocomplete" placeholder="Nombre" aria-label="lead" aria-describedby="basic-addon1">
                </div>
            </form>
        </div>
        <br>
    <div class="table-responsive">
        <table class="table table-hover mr-auto">
            <thead>
                <tr>
                    <th scope="col" style="color:#00695c">Cedula</th>
                    <th scope="col" style="color:#00695c">Nombre</th>
                    <th scope="col" style="color:#00695c">Apellido</th>
                    <th scope="col" style="color:#00695c">Correo</th>
                    <th scope="col" style="color:#00695c">Cargo</th>
                    <th scope="col" style="color:#00695c"></th>
                    <th scope="col" style="color:#00695c"></th>
                    {{-- <th>Editar</th>
                    <th>Eliminar</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($empleado as $i)
                    <tr>
                        <td scope="row">{{$i->cedula}}</td>
                        <td>{{$i->nombre}}</td>
                        <td>{{$i->apellido}}</td>
                        <td>{{$i->correo}}</td>
                        <td>{{$i->role}}</td>
                        <td><a href="{{ route('empleados.edit', $i->cedula) }}"><i class="material-icons" style="color:#00838f">edit</i></a></td>
                        <td class="delete" tabla="empleado" identificador="{{$i->cedula}}"><i class="material-icons" style="color:#c62828">delete</i></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
</div>
    <br>
    <br>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/ajax.js') }}"></script>
<script>autocompletar('empleado', ["nombre", "apellido"])</script>
@endsection
