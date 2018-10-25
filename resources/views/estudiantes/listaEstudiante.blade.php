@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Estudiante')
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
                            <span class="input-group-text" id="basic-addon1" style="background-color:#00acc1;"><i class="fas fa-search" style="color:white;"></i></span>
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
                        <th scope="col" style="color:#00695c">Código</th>
                        <th scope="col" style="color:#00695c">Nombre</th>
                        <th scope="col" style="color:#00695c">Apellido</th>
                        {{-- <th scope="col" style="color:#00695c">Clave</th> --}}
                        <th scope="col" style="color:#00695c">Grado</th>
                        <th scope="col" style="color:#00695c"></th>
                        <th scope="col" style="color:#00695c"></th>
                        {{-- <th>Editar</th>
                        <th>Eliminar</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estudiante as $i)
                        <tr>
                            <td>{{$i->pk_estudiante}}</td>
                            <td>{{$i->nombre}}</td>
                            <td>{{$i->apellido}}</td>
                            {{-- <td>{{$i->clave}}</td> --}}
                            <td>{{$i->grado}}</td>
                            <td><a href="{{ route('estudiantes.edit', $i->pk_estudiante) }}"><i class="fas fa-edit" style="color:#00838f"></i></a></td>
                            <td class="delete" tabla="estudiante" identificador="{{$i->pk_estudiante}}"><i class="fas fa-trash-alt" style="color:#c62828"></i></td>
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
    <script>autocompletar('estudiante', ["nombre", "apellido"])</script>
{{-- <div class="row">
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
<script src="{{ asset('js/ajax.js') }}"></script>
<script>autocompletar('estudiante', ["nombre", "apellido"])</script> --}}
@endsection
