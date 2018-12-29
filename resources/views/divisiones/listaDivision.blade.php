@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista de Divisiones')
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-10">
            <form action="" id="autocompletar">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="background-color:#00acc1;"><i class="fas fa-search" style="color:white;"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="autocomplete-input" class="autocomplete" placeholder="Nombre" aria-label="lead" aria-describedby="basic-addon1">
                    </div>
                </form>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-condensed table-hover text-center">
                        <thead>
                            <th scope="col" style="color:#00695c">Nombre</th>
                            <th scope="col" style="color:#00695c">Descripción</th>
                            <th scope="col" style="color:#00695c"><i class="fas fa-percentage"></i></th>
                            {{-- <th scope="col" style="color:#00695c">Acciones</th> --}}
                        </thead>
                        <tbody>
                            @foreach ($division as $i)
                                <tr>
                                    <td scope="row">{{ ucfirst($i->nombre) }}</td>
                                    <td>{{ ucfirst($i->descripcion) }}</td>
                                    <td>{{ $i->porcentaje }}</td>
                                    {{-- <td><a href="{{ route('divisiones.edit', date('Y')) }}"><i class="fas fa-edit" style="color:#00838f"></i>
                                    </a></td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection


