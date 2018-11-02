@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista de Divisiones')
<br>
<div class="container">
    <div class="row center">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="col-md-12">
                <form action="" id="autocompletar">
                    @csrf
                    <div class="input-group mb-3">
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
                            <th scope="col" style="color:#00695c">Nombre</th>
                            <th scope="col" style="color:#00695c">Descripción</th>
                            <th scope="col" style="color:#00695c"><i class="fas fa-percentage"></i></th>
                            <th scope="col" style="color:#00695c"></th>
                            <th scope="col" style="color:#00695c"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach ($division as $i)
                            <td scope="row">{{ $i->nombre }}</td>
                            <td>{{ $i->descripcion }}</td>
                            <td>{{ $i->porcentaje }}</td>
                            <td><a href="{{ route('divisiones.edit', $i->pk_division) }}"><i class="fas fa-edit" style="color:#00838f"></i>
                            </a></td>
                            <td class="delete" tabla="divisiones" identificador="{{$i->pk_division}}"><i class="fas fa-trash-alt" style="color:#c62828"></i></td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/ajax.js') }}"></script>
<script>autocompletar('division', ['ano', 'nombre'])</script>
@endsection


