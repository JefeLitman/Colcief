@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo','Estudiantes/Grado')
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @php
                $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
             @endphp
             <h4 class="text-center"> Curso {{$g[$grado->prefijo]}} - {{$grado->sufijo}} </h4>
            <div class="text-center">
                @if (session('role')=="administrador" or session('role')=="coordinador")
                    <a href="/boletines/cursos/{{$grado->pk_curso}}/pdf" style="margin-bottom: 10px;display:block;">
                        <button type="button" class="btn btn-primary w-30 mx-auto" data-toggle="modal" data-target="#empleadoModal">
                            <i class="fas fa-file-pdf" style="color:white"></i> Boletines Curso
                        </button>
                    </a>
                @endif
                <a href="/cursos/{{$grado->pk_curso}}/planillas">
                    <button type="button" class="btn btn-primary w-30 mx-auto" data-toggle="modal" data-target="#empleadoModal">
                        <i class="fas fa-clipboard-list" style="color:white"></i> Ver planillas
                    </button>
                </a><br>
            </div>
            <br>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Información</strong><br>
                Los estudiantes que aparezcan resaltados, tienen habilitado que se les cambie la nota de periodos pasados desde el concentrador.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <br>
             <div class="table-responsive" >
                 <table class="table table-hover mr-auto" id="myTable">
                     <thead>
                         <tr>
                             <th class="text-center" scope="col" style="color:#00695c">Código</th>
                             <th class="text-center" scope="col" style="color:#00695c">Nombre</th>
                             <th class="text-center" scope="col" style="color:#00695c">Apellido</th>
                             <th class="text-center" scope="col" style="color:#00695c">Ultimo grado aprobado</th>
                             <th class="text-center" scope="col" style="color:#00695c" colspan="6">Acciones</th>
                         </tr>
                     </thead>
                     <tbody>
                         @if (empty($curso[0]))
                             <tr>
                                 <td colspan="7">
                                     <div class="text-center">No hay estudiantes</div>
                                 </td>
                             </tr>
                         @else
                             @foreach ($curso as $c)
                                 <tr id="estudiantes{{$c->pk_estudiante}}" @if ($c->switch_concentrador)
                                   bgcolor="FFCF6C"
                                 @endif>
                                     <td class="text-center">{{$c->pk_estudiante}}</td>
                                     <td class="text-center">{{ucwords($c->nombre)}}</td>
                                     <td class="text-center">{{ucwords($c->apellido)}}</td>
                                     <td class="text-center">
                                        @if (empty($c->grado))
                                            -
                                        @else
                                            {{$c->grado}}
                                        @endif
                                        </td>
                                        {{-- Ver boletines pdf --}}
                                        @if (session('role')=="administrador" or session('role')=="coordinador")
                                            <td class="text-center">
                                                <a data-toggle="tooltip" data-placement="top" title="Descargar Boletin" href="/boletines/actual/estudiantes/{{$c->pk_estudiante}}/pdf">
                                                    <i class="far fa-file-pdf" style="color:#00838f"></i>
                                                </a>
                                            </td>
                                        @endif

                                     {{-- ver boletines --}}
                                     <td class="text-center">
                                         <a data-toggle="tooltip" data-placement="top" href="/boletines/estudiantes/{{$c->pk_estudiante}}" title="Boletines"><i class="fas fa-clipboard-list" style="color:#00838f"></i></a>
                                     </td>
                                     {{-- Ver estudiantes --}}
                                     <td class="text-center">
                                         <a href="{{ route('estudiantes.show', $c->pk_estudiante) }}" title="Detalles" data-toggle="tooltip" data-placement="top"><i class="fas fa-eye" style="color:#00838f"></i>
                                         </a>
                                     </td>
                                     @if (session('role') == 'administrador')
                                         {{-- Editar estudiantes --}}
                                        <td class="text-center">
                                            <a href="{{ route('estudiantes.edit', $c->pk_estudiante) }}" title="Editar" data-toggle="tooltip" data-placement="top"><i  class="fas fa-edit" style="color:#00838f"></i>
                                            </a>
                                        </td>
                                        {{-- Habilitar switch_concentrador --}}
                                        <td class="text-center">
                                          <a href="/concentrador/switch/{{$c->pk_estudiante}}"><i title="On/Off concentrador" data-toggle="tooltip" data-placement="top" class="far fa-check-square" style="color:#00838f"></i></a>
                                        </td>
                                        {{-- Eliminar estudiantes --}}
                                        <td class="text-center">
                                            <a class="delete" padre="estudiantes{{$c->pk_estudiante}}" ruta="estudiantes" identificador="{{$c->pk_estudiante}}"><i title="Eliminar" data-toggle="tooltip" data-placement="top" class="fas fa-trash-alt" style="color:#c62828"></i></a>
                                        </td>
                                     @endif
                                 </tr>
                             @endforeach
                         @endif
                     </tbody>
                 </table>
             </div>
        </div>
    </div>
</div>
{{-- <script src="{{ asset('js/ajax.js') }}"></script> --}}
@endsection
