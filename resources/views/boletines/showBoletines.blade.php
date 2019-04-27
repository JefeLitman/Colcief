@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
{{-- Esta vista es para todos los roles por este motivo el banner se adapta y algunos botones no aparecen segun sea el role --}}
@section('titulo','Boletines')
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
                    @if (count($estudiante)==0)
                        <div class="text-center"> El estudiante no existe </div>
                    @else
                        <table class="table table-borderless table-sm w-75 mx-auto">
                            <tbody>
                                <tr>
                                    <td><b>Nombre: </b> {{ucwords($estudiante[0]->nombre)}} </td>
                                    <td><b>Apellido: </b> {{ucwords($estudiante[0]->apellido)}}</td>
                                    <td><b>Discapasidad: </b> {{($estudiante[0]->Discapasidad)?"Si":"No"}}</td>
                                    </tr>
                                    <tr>
                                    <td><b>Fecha de nacimiento: </b> {{$estudiante[0]->fecha_nacimiento}}</td>
                                    <td><b>Ultimo curso aprobado: </b>
                                        @if ($estudiante[0]->grado != null)
                                            {{($estudiante[0]->grado==0)?"Preescolar":$estudiante[0]->grado}} 
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td><b>Curso actual: </b>
                                        @if ($estudiante[0]->prefijo==null or $estudiante[0]->prefijo==null)
                                            -
                                        @else
                                            {{($estudiante[0]->prefijo==0)?"Preescolar":$estudiante[0]->prefijo}}-{{$estudiante[0]->sufijo}}
                                        @endif
                                        
                                    </td>
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
                                    @if (count($boletines)==0)
                                        <tr>
                                            <td colspan="4">
                                                <div class="text-center">No hay boletines registrados</div>
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
                                                {{-- Acciones--}}
                                                <td class="text-center">
                                                    <a href="/boletines/{{$b->ano}}/estudiantes/{{$estudiante[0]->pk_estudiante}}" data-toggle="tooltip" data-placement="right" title="Ver"><i class="fas fa-eye cambiob" style="color:#17a2b8"></i></a>
                                                    @if (session('role')=="administrador") 
                                                        <a href="/boletines/{{$b->ano}}/estudiantes/{{$estudiante[0]->pk_estudiante}}/pdf" data-toggle="tooltip" data-placement="right" title="PDF"><i class="fas fa-file-pdf cambiob" style="color:#17a2b8"></i></a> 
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        @endif
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
