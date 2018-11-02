@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Estudiante')
    <form id="grado" method="post">
        @csrf
        @for ($i = 0; $i < 12; $i++)
            <label for="grado[{{$i}}]">{{$i}}</label>
            <input type="checkbox" name="grado[{{$i}}]" id="grado[{{$i}}]" value="{{$i}}">
        @endfor
        <br>
        @foreach ($curso as $item)
            <label for="curso[{{$item->pk_curso}}]">{{$item->nombre}}</label>
            <input type="checkbox" name="curso[{{$item->pk_curso}}]" id="curso[{{$item->pk_curso}}]" value="{{$item->pk_curso}}">
        @endforeach
    </form>
    <div class="container">
        <br>
        <br id="br">
        <div class="col-md-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button id="filter" type="submit" form="grado" class="btn btn-outline-secondary"><i class="fas fa-filter"></i></button> 
                </div>
                <input type="text" class="form-control" aria-label="Text input with dropdown button">
            </div>
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
    <br>
    <script>
    
    </script>
    <script src="{{ asset('js/ajax.js') }}"></script>
    {{-- <script>autocompletar('estudiante', ["nombre", "apellido"])</script> --}}
@endsection
