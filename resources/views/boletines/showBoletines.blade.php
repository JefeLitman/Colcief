@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
{{-- Esta vista es para todos los roles por este motivo el banner se adapta y algunos botones no aparecen segun sea el role --}}
@section('titulo','Planilla '.$materiapc->materia)
<br id="br">
@php
    $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
@endphp
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- Encabezado --}}
            <div class="card bg-light border-info mb-3">
                 <div class="card-header text-center">
                     <h5>
                         BOLETINES
                    </h5>
                 </div>
                <div class="card-body">
                    <table class="table table-borderless table-sm w-75 mx-auto">
                        <tbody>
                            <tr>
                            <td><b>Nombre: </b> {{ucwords($estudiante->nombre)}} </td>
                            <td><b>Apellido: </b> {{ucwords($estudiante->apellido)}}</td>
                            <td><b>Discapasidad: </b> {{($estudiante->Discapasidad)?"Si":"No"}}</td>
                            </tr>
                            <tr>
                            <td><b>Fecha de nacimiento: </b> {{$estudiante->fecha_nacimiento}}</td>
                            <td><b>Ultimo curso aprovado: </b> {{($estudiante->grado==0)?"Preescolar":$estudiante->grado or "-"}}</td>
                            <td><b>Curso actual: </b> {{($estudiante->prefijo==0)?"Preescolar":$estudiante->prefijo or "-"}}-{{$estudiante->sufijo or "-"}}</td>
                            </tr>
                        </tbody>
                    </table>                
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col" style="color:#00695c" class="text-center"> Año </th>
                                    <th scope="col" style="color:#00695c" class="text-center"> Curso </th>
                                    <th scope="col" style="color:#00695c" class="text-center"> Estado </th>
                                    <th scope="col" style="color:#00695c" class="text-center"> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($result)==0 or count($result[$m->pk_materia])==0)
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-center">No se han asignado cursos a docentes. Para crear haga click <a style="text-decoration:underline" href="/materiaspc/crear">aquí</a>.</div>
                                        </td>
                                    </tr>
                                @else
                                    @foreach($boletines as $b)
                                        <tr>
                                            {{--  Año  --}}
                                            <td class="text-center"> {{$b->ano}}</td>
                                            {{-- Curso --}}
                                            <td class="text-center"> {{($b->prefijo==0)?"Preescolar":$b->prefijo}}-{{$b->sufijo}}</td>
                                            {{--  curso  --}}
                                            <td class="text-center">
                                                @switch($b->estado)
                                                    @case('a')
                                                        {{"Aprobó"}}
                                                        @break
                                                    @case('b')
                                                        {{"Reprobó"}}
                                                        @break
                                                    @default 
                                                        {{"Indefinido"}}
                                                @endswitch
                                            </td>
                                            {{-- editar materiapc --}}
                                            <td class="text-center"><a href="{{ route('materiaspc.edit',$j[0]) }}" title="Editar"><i class="fas fa-edit cambiob" style="color:#17a2b8"></i>
                                            </a></td>
                                            {{-- eliminar materiapc --}}
                                            <td class="text-center">
                                                <a padre="materiapc{{$k}}" class="delete" ruta="materiaspc" identificador="{{$j[0]}}" title="Eliminar"><i class="fas fa-trash-alt cambiobe" style="color:#c62828"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
