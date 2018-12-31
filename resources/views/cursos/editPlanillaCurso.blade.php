@extends('contenedores.'.((session('role')=='administrador')?'admin':'profesor'))
@section('contenedor_'.((session('role')=='administrador')?'admin':'profesor'))
@section('titulo','Planilla '.$materiapc->materia)
<br id="br">
@php
    $g = ["0"=>"Preescolar","1" => "Primero","2" => "Segundo", '3' => "Tercero" , '4' => 'Cuarto', '5' =>  'Quinto', '6' =>  'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno','10'=>'Décimo','11'=>'Once'];
@endphp
<div class="container" style="background:#fafafa !important;">
    {{-- Encabezado --}}
    <div class="card bg-light border-info mb-3">
            <div class="card-header text-center"><h5>COLEGIO INTEGRADO EZEQUIEL FLORIAN<span class="table-add float-right"><a  href='{{url(str_replace('/editar', '', Request::path()))}}' class="text-info"><i  data-toggle="tooltip" data-placement="bottom" title="Ver Planilla" class="far fa-eye fa-lg"></i></a></span></h5></div>
        <div class="card-body">
                <table class="table table-borderless table-sm w-75 mx-auto">
                    <tbody>
                        <tr>
                        <td><b>Materia: </b> {{ucwords($materiapc->materia)}}</td>
                        <td><b>Grado: </b> {{$g[$materiapc->prefijo]}}</td>
                        <td><b>Curso: </b> {{$materiapc->sufijo}}</td>
                        </tr>
                        <tr>
                        <td><b>Docente: </b> {{ucwords($materiapc->nombre)}} {{ucwords($materiapc->apellido)}}</td>
                        <td><b>Periodo: </b> {{ucwords($g[$p->nro_periodo])}}</td>
                        <td><b>Año: </b> {{$materiapc->created_at->year}}</td>
                        </tr>
                    </tbody>
                </table>
                <h5 class="text-center card-title">Modo Edición</h5>
                <div class="input-group input-group-sm mb-3 w-50 mx-auto">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Filtrar</span>
                    </div>
                    <input id="entradafilter" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div id="avisoError" class="alert alert-danger" style="display:none">
                    Error: Verifique que: <br>
                    <ul>
                        <li>Las asistencias no pueden ser negativas. </li>
                        <li>Las notas deben ser entre 1.0 y 5.0.</li>
                        <li>Las casillas con errores tienen un borde rojo y no son guardadas en el sistema.</li>
                        <li>Se recomienda el uso de Chrome.</li>
                    </ul>
                </div>
                <div id="avisos"></div>
        <div id="table" class="table-editable">
          <p class="card-text">
            <div class="table-responsive">
            <table class="table table-striped table-condensed table-sm  table-hover text-center">
                <thead>
                    <tr class="table-info" >
                        <th rowspan="2">Nombres</th>
                        <th rowspan="2">IA</th>
                        @foreach ($divisiones as $d)
                        {{-- Encabezado: Nota de  la division --}}
                        <th data-toggle="tooltip" data-placement="bottom" title="{{$d->descripcion}}" colspan="{{count($notas[$p->pk_periodo][$d->pk_division])}}" class="table-primary">
                            {{$d->nombre}} <span class="badge badge-pill badge-primary">{{$d->porcentaje}}%</span>
                        </th>
                        <th></th>
                        @endforeach
                        <th rowspan="2" data-toggle="tooltip" data-placement="bottom" title="Nota Periodo 1" >P1</th>
                        <th rowspan="2" data-toggle="tooltip" data-placement="bottom" title="Nota Periodo 2" >P2</th>
                        <th rowspan="2" data-toggle="tooltip" data-placement="bottom" title="Nota Periodo 3" >P3</th>
                        <th rowspan="2" data-toggle="tooltip" data-placement="bottom" title="Nota Periodo 4" >P4</th>
                        <th rowspan="2" data-toggle="tooltip" data-placement="bottom" title="Nota definitiva del año" >NF</th>
                    </tr>
                    <tr>
                        @foreach ($divisiones as $d)

                            @foreach ($notas[$p->pk_periodo][$d->pk_division] as $n)
                                {{-- Encabezado: Notas--}}

                                <th class="table-secondary" data-toggle="tooltip" data-placement="bottom" title="{{$n->descripcion}}" >
                                    {{$n->nombre}} <span class="badge badge-pill badge-secondary">{{$n->porcentaje}}%</span>
                                </th>
                            @endforeach
                        <th class="table-secondary">D</th>
                        @endforeach
                    </tr>

                </thead>
                <tbody class="contenidobusqueda ">
                        @foreach ($estudiantes as $e)
                        <tr>
                            <td>
                                {{-- Nombre del estudiante --}}
                                {{$e->nombre}} {{$e->apellido}}
                            </td>
                            <td contenteditable="true" id="inasistencias{{$notaPer[$e->pk_estudiante][$p->pk_periodo]->pk_nota_periodo}}" pk="{{$notaPer[$e->pk_estudiante][$p->pk_periodo]->pk_nota_periodo}}" onkeyup="updateInasistencias(this);">
                                {{-- Numero de inasistencias por el periodo seleccionado del estudiante --}}
                                {{$notaPer[$e->pk_estudiante][$p->pk_periodo]->inasistencias}}
                            </td>
                                @foreach ($divisiones as $d)
                                    @foreach ($notas[$p->pk_periodo][$d->pk_division] as $n)
                                        <td contenteditable="true" p="{{$n->porcentaje}}" id="nota{{$notaE[$e->pk_estudiante][$p->pk_periodo][$d->pk_division][$n->pk_nota]->pk_nota_estudiante}}" pk="{{$notaE[$e->pk_estudiante][$p->pk_periodo][$d->pk_division][$n->pk_nota]->pk_nota_estudiante}}" fk="notaDiv{{$notaE[$e->pk_estudiante][$p->pk_periodo][$d->pk_division][$n->pk_nota]->fk_nota_division}}"  onkeyup="updateNotasE(this);" notaAceptada="{{$notaE[$e->pk_estudiante][$p->pk_periodo][$d->pk_division][$n->pk_nota]->nota}}">
                                            {{-- Notas del estudiante --}}
                                            {{$notaE[$e->pk_estudiante][$p->pk_periodo][$d->pk_division][$n->pk_nota]->nota}}
                                        </td>
                                    @endforeach
                                    <td p="{{$d->porcentaje}}" id="notaDiv{{$notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->pk_nota_division}}" pk="{{$notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->pk_nota_division}}" fk="notaPer{{$notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->fk_nota_periodo}}"
                                         data-toggle="tooltip" data-placement="bottom"
                                        @if ($notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division <= 2.9)
                                            class="table-danger"  title="Nota Baja"
                                        @elseif($notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division >= 3 && $notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division <= 3.9)
                                            class="table-warning"  title="Nota Basica"
                                        @elseif($notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division >= 4 && $notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division <= 4.5)
                                            class="table-primary"  title="Nota Alta"
                                        @else
                                            class="table-success" title="Nota Superior"
                                        @endif >
                                        {{-- Notas por division del estudiante --}}
                                        {{$notaDiv[$e->pk_estudiante][$p->pk_periodo][$d->pk_division]->nota_division}}
                                    </td>
                                @endforeach
                                @foreach ($periodos as $z)
                                <td  id="notaPer{{$notaPer[$e->pk_estudiante][$z->pk_periodo]->pk_nota_periodo}}" pk="{{$notaPer[$e->pk_estudiante][$z->pk_periodo]->pk_nota_periodo}}" fk="materia{{$notaPer[$e->pk_estudiante][$z->pk_periodo]->fk_materia_boletin}}" data-toggle="tooltip" data-placement="bottom" 
                                    @if ($notaPer[$e->pk_estudiante][$z->pk_periodo]->nota_periodo<= 2.9)
                                        class="table-danger"  title="Nota Periodo Baja"
                                    @elseif($notaPer[$e->pk_estudiante][$z->pk_periodo]->nota_periodo >= 3 && $notaPer[$e->pk_estudiante][$z->pk_periodo]->nota_periodo <= 3.9)
                                        class="table-warning"  title="Nota Periodo Basica"
                                    @elseif($notaPer[$e->pk_estudiante][$z->pk_periodo]->nota_periodo >= 4 && $notaPer[$e->pk_estudiante][$z->pk_periodo]->nota_periodo <= 4.5 )
                                        class="table-primary"  title="Nota Periodo Alta"
                                    @else
                                        class="table-success" title="Nota Periodo Superior"
                                    @endif >
                                {{-- Notas por periodo del estudiante --}}
                                {{$notaPer[$e->pk_estudiante][$z->pk_periodo]->nota_periodo}}
                                </td>
                                @endforeach

                            <td id="materia{{$e->pk_materia_boletin}}" pk="{{$e->pk_materia_boletin}}" data-toggle="tooltip" data-placement="bottom"
                                @if ($e->nota_materia <= 2.9)
                                    class="table-danger"  title="Nota Final Baja"
                                @elseif($e->nota_materia >= 3 && $e->nota_materia <= 3.9)
                                    class="table-warning"  title="Nota Final Basica"
                                @elseif($e->nota_materia >= 4 && $e->nota_materia <= 4.5)
                                    class="table-primary"  title="Nota Final Alta"
                                @else
                                    class="table-success" title="Nota Final Superior"
                                @endif >
                                {{-- Nota final del estudiante --}}
                                {{$e->nota_materia}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </p>
        </div>
        <div class="text-center">
            <a href="/notas/materiaspc/{{$materiapc->pk_materia_pc}}/periodos/{{$p->pk_periodo}}" class="btn btn-success" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;">
                Ver notas
            </a>
        </div>
        </div>
      </div>
      <table class="table table-borderless table-sm text-center">
          <tbody>
              <tr>
                  <td><i class="fas fa-square text-danger"></i> Bajo [ 1.0 - 2.9 ]  </td>
                  <td><i class="fas fa-square text-warning"></i> Basico [ 3.0 - 3.9 ]</td>
                  <td><i class="fas fa-square text-primary"></i> Alto [ 4.0 - 4.5 ]</td>
                  <td><i class="fas fa-square text-success"></i> Superior [ 4.6 - 5.0 ]</td>
              </tr>
          </tbody>
      </table>
</div>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $(document).ready(function(){
            $('#entradafilter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
                $('.contenidobusqueda tr').hide();
                $('.contenidobusqueda tr').filter(function () {
                    return rex.test($(this).text());
                }).show();

        })

  });
    </script>



<script src="{{ asset('js/editarNotasProfesor.js') }}"></script>
@endsection
