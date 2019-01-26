@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista de Divisiones')
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
                <h4 class="text-center"> <i class="fas fa-th-list"></i> Componentes</h4>
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


