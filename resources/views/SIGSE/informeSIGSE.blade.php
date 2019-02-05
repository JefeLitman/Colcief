@extends('contenedores.'.((session('role')=='administrador')?'admin':session('role')))
@section('titulo','Notas')
@section('contenedor_'.((session('role')=='administrador')?'admin':session('role')))
@section('titulo','Informe SIGSE de {{$infoMateria->getCursoCompleto()}}')

<div class="container" style="background-color: #fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <h4>
                Informe SIGSE {{$infoMateria->nombre.' de '.$infoMateria->getCursoCompleto()}}
            </h4>
            <br>
            <div class="table-responsive">
                <table class="table  table-striped table-condensed table-hover text-center">
                    <thead>
                        <tr>
                            <th  class="center" scope="col" style="color:#00695c">Criterio</th>
                            <th  class="center" scope="col" style="color:#00695c">Masculino</th>
                            <th  class="center" scope="col" style="color:#00695c">Femenino</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($informe[0] as $criterio => $generos)
                        <tr>
                            <td class="center">{{$criterio}}</td>
                            <td class="center">{{$generos[0]}}</td>
                            <td class="center">{{$generos[1]}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table  table-striped table-condensed table-hover text-center">
                    <thead>
                        <tr>
                            <th>Total de estudiantes: {{$informe[1]}}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
