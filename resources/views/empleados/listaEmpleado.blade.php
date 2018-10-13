@extends('contenedores.admin')
@section('contenedor_principal')
@section('titulo','No se q poner de titulo, se los dejo a uds xD')
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
                    <th>Grado</th>
                    <th>Cargo</th>
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
                        <td><a href="{{ url('/empleados/'.$i->cedula.'/editar') }}"><i class="cyan-text darken-3 material-icons">edit</i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/autocomplete.js') }}"></script>
<script>autocompletar('empleado', ["nombre", "apellido"])</script>
@endsection
