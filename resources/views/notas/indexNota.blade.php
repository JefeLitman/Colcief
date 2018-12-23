@extends('contenedores.'.((session('role')=='administrador')?'admin':'profesor'))
@section('contenedor_'.((session('role')=='administrador')?'admin':'profesor'))
@section('titulo','Notas')
<br id="br">
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <h3 class="text-center mb-0">
            Notas
        </h3>
        <br>
            <div class="table-responsive">
                <table class="table table-hover mr-auto">
                    <thead>
                        <tr>
                            <th class="center" scope="col" style="color:#00695c">Componente</th>
                            <th class="center" scope="col" style="color:#00695c">Notas pertenecientes al corte</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($divisiones as $nombre => $division)
                        <tr>
                            <td class="center">{{$nombre}}</td>
                        <td>
                    </tbody>
                            <table>
                            <tr>
                                <th>Pk_nota</th>
                                <th>Nombre nota</th>
                                <th>Porcentaje</th>
                            </tr>
                            @foreach ($division as $nota)
                                <tr>
                                <td>{{$nota['pk_nota']}}</td>
                                <td>{{$nota['nombre']}}</td>
                                <td>{{$nota['porcentaje']}}</td>
                                </tr>
                            @endforeach
                            </table>
                        </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
