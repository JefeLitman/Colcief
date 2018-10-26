@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Estudiante')
<div class="container">
        <div class="row center">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <br>
            <br id="br">
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
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script>autocompletar('estudiante', ["nombre", "apellido"])</script>
@endsection
