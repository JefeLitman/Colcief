@extends('contenedores.admin')
@section('contenedor_principal')
@section('titulo','Lista Empleados')
<div class="row">
    <form action="" id="autocompletar">
        <div class="col s12">
            <div class="input-field col s12">
                @csrf
                <i class="material-icons prefix">textsms</i>
                <input type="text" id="autocomplete-input" class="autocomplete">
                <label for="autocomplete-input">Autocomplete</label>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col s2"></div>
    <div class="col s8 center">
        <table class="responsive-table striped">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Cargo</th>
                    {{-- <th>Editar</th>
                    <th>Eliminar</th> --}}
                </tr>
            </thead>

            <tbody>
                @foreach ($empleado as $i)
                    <tr>
                        <td>{{$i->cedula}}</td>
                        <td>{{$i->nombre}}</td>
                        <td>{{$i->apellido}}</td>
                        <td>{{$i->correo}}</td>
                        <td>{{$i->role}}</td>
                        <td><a href="{{ route('empleados.edit', $i->cedula) }}"><i class="cyan-text darken-3 material-icons">edit</i></a></td>
                        <td class="delete" tabla="empleado" identificador="{{$i->cedula}}"><i class="red-text darken-3 material-icons">delete</i></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/ajax.js') }}"></script>
<script>autocompletar('empleado', ["nombre", "apellido"])</script>
@endsection
