@extends('contenedores.admin')
@section('contenedor_principal')
<div class="col s12 m8 offset-m1 xl7 offset-xl1">
    <form action="" id="autocompletar">
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        @csrf
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <div id="aux"></div>
                        <label for="autocomplete-input">Autocomplete</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <table class="responsive-table">
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/autocomplete.js') }}"></script>
<script>autocompletar('estudiante', ["nombre", "apellido"])</script>
@endsection


