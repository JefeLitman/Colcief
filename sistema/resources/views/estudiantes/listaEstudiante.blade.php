@role('0')
    <p>Hola eres un admin y todo lo que tenga que ver contigo aparecerá aquí</p>
    {{-- @extends('contenedores.admin')
    @section('titulo','Lista Estudiante')
    @section('contenedor_principal')  --}}
@endrole
@role('3')
    <p>Hola eres un estudiante y todo lo que tenga que ver contigo aparecerá aquí</p>
    @include('contenedores.estudiante')
    @section('titulo','Estudiante')
    @section('contenedor_estudiante')
@endrole

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
                        <td><a href="{{ route('estudiantes.edit', $i->pk_estudiante) }}"><i class="cyan-text darken-3 material-icons">edit</i></a></td>
                        <td class="delete" tabla="estudiante" identificador="{{$i->pk_estudiante}}"><i class="red-text darken-3 material-icons">delete</i></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/ajax.js') }}"></script>
<script>autocompletar('estudiante', ["nombre", "apellido"])</script>
@endsection
