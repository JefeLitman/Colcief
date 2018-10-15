@extends('contenedores.admin')
@section('contenedor_principal')
@section('titulo','Lista Estudiante')
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
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Clave</th>
                    <th>Grado</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($estudiante as $i)
                    <tr>
                        <td>{{$i->pk_estudiante}}</td>
                        <td>{{$i->nombre}}</td>
                        <td>{{$i->apellido}}</td>
                        <td>{{$i->clave}}</td>
                        <td>{{$i->grado}}</td>
                        <td><a href="{{ url('/estudiantes/'.$i->pk_estudiante.'/editar') }}"><i class="cyan-text darken-3 material-icons">edit</i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/autocomplete.js') }}"></script>
<script>autocompletar('estudiante', ["nombre", "apellido"])</script>
@endsection
