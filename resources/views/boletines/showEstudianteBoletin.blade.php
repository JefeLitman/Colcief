

@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Estudiantes/Grado')
{{-- Envio ["msj"=>$msj,"boletin"=>$B[0],"materias"=>$materias,"infoPeriodos"=>$infoPeriodos,"notaPeriodos"=>$notaPeriodos,"infoDivs"=>$infoDivs,"notasDiv"=>$notaDivs] --}}
<br>
<div class="container" style="background:#fafafa !important;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if ($msj == 1)
                <h3 class="card-title text-center"> No hay estudiantes o boletines correspondientes</h3>
            @else
                {{-- Solo el boletin aparece, curso y en si defecto estudiante sin materias asignadas --}}
                {{-- El encabezado es comun para el 2 y 3 por eso realicé asi la estructura --}}
                <h3 class="card-title text-center">Boletín {{$boletin->ano}}</h3>
                <br>
                {{--  Información del estudiantes  --}}
                <script>
                    function cambioPeriodo($value){
                        elements=document.getElementsByClassName('T');
                        for(i=0;i<elements.length;i++){
                            elements[i].style.display="none";
                        }
                        elements=document.getElementsByClassName($value);
                        for(i=0;i<elements.length;i++){
                            elements[i].style.display="";
                        }
                    }
                </script>
                {{--  tabla   --}}
                <div class="table-responsive">
                    <table class="table table-hover mr-auto">
                        <thead>
                            <tr>
                                <th scope="col" style="color:#00695c" class="text-center">
                                    Estudiante
                                </th>
                                <th scope="col" style="color:#00695c" class="text-center">
                                    Fecha de nacimiento
                                </th>
                                <th scope="col" style="color:#00695c" class="text-center">
                                    Discapacidad
                                </th>
                                <th scope="col" style="color:#00695c" class="text-center">
                                    Curso
                                </th>
                                <th scope="col" style="color:#00695c" class="text-center">
                                    Periodo
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{--  Estudiante  --}}
                                <td class="text-center">{{$boletin->nombre}} {{$boletin->apellido}}</td>

                                {{--  Fecha de nacimiento  --}}
                                <td class="text-center">{{$boletin->fecha_nacimiento}}</td>

                                {{--  Discapacidad  --}}
                                <td class="text-center">{{($boletin->discapacidad)?"Si":"No"}}</td>

                                {{--  Curso  --}}
                                <td class="text-center">{{($boletin->prefijo==0)?"Preescolar":$boletin->prefijo}} - {{$boletin->sufijo}}</td>

                                {{--  Periodo  --}}
                                <td class="text-center">
                                    <select class="custom-select custom-select-sm" name="periodo" id="periodo" onchange="cambioPeriodo(this.value)">
                                        @foreach ( $infoPeriodos as $p )
                                            <option value="P{{$p->nro_periodo}}">Periodo {{$p->nro_periodo}}</option>
                                        @endforeach
                                        <option value="P" selected>Todos los periodos</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{--  <b> Estudiante:</b> {{$boletin->nombre}} {{$boletin->apellido}} <br>
                <b> Fecha de nacimiento:</b> {{$boletin->fecha_nacimiento}} <br>
                <b> Discapasidad:</b> {{($boletin->discapacidad)?"Si":"No"}} <br>
                <b> Curso:</b> {{($boletin->prefijo==0)?"Preescolar":$boletin->prefijo}} - {{$boletin->sufijo}}<br> <br>

                <b> Ver: </b>
                <select name="periodo" id="periodo" onchange="cambioPeriodo(this.value)">
                    @foreach ( $infoPeriodos as $p )
                        <option value="P{{$p->nro_periodo}}">Periodo {{$p->nro_periodo}}</option>
                    @endforeach
                    <option value="P" selected>Todos los periodos</option>
                </select><br><br>  --}}
                <br>
                @switch($msj)
                    @case(2)
                        <h4> NOTAS </h4>
                        <h3 class="card-title text-center">No hay materias matriculadas para el grado de este estudiante.</h3>
                        @break
                    @case(3)
                        <div class="table-responsive" >
                            <table class="table table-hover mr-auto" id="myTable">
                                <thead>
                                    {{-- Cabecero tabla --}}
                                    <tr>
                                        <th class="text-center" scope="col" style="color:#00695c" >Materias</th>
                                        @foreach ($infoPeriodos as $periodo)
                                            @foreach ($infoDivs as $div)
                                                    <th class="P{{$periodo->nro_periodo}} T" scope="col" style="color:#00695c;display:none;">{{$div->nombre}} ({{$div->porcentaje}}%)</th>
                                            @endforeach
                                            <th class="P{{$periodo->nro_periodo}} P T text-center" scope="col" style="color:#00695c">Nota P{{$periodo->nro_periodo}}</th>
                                        @endforeach
                                        <th class="P T text-center" scope="col" style="color:#00695c">Nota final</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Contenido Tabla --}}
                                    @foreach ($materias as $m)
                                        <tr>
                                            <td>{{$m->nombre}}</td>
                                            @foreach ($infoPeriodos as $periodo)
                                                @foreach ($infoDivs as $div)
                                                    <td class="P{{$periodo->nro_periodo}} T text-center" style="display:none">

                                                        @if (intval($notaDivs[$m->pk_materia_boletin][$periodo->pk_periodo][$div->pk_division]) >= '3')
                                                            <p>
                                                                {{$notaDivs[$m->pk_materia_boletin][$periodo->pk_periodo][$div->pk_division] or "-"}}
                                                            </p>
                                                        @else
                                                            <b style="color: red;">
                                                                {{$notaDivs[$m->pk_materia_boletin][$periodo->pk_periodo][$div->pk_division] or "-"}}
                                                            </b>
                                                        @endif
                                                        {{--Info: Echoing Data If It Exists -> https://laravel.com/docs/5.1/blade --}}
                                                    </td>
                                                @endforeach
                                                <td class="P{{$periodo->nro_periodo}} P T text-center">

                                                        @if (intval($notaPeriodos[$m->pk_materia_boletin][$periodo->pk_periodo]) >= '3')
                                                            <p>
                                                            {{$notaPeriodos[$m->pk_materia_boletin][$periodo->pk_periodo]}}
                                                            </p>
                                                        @else
                                                        <b style="color: red;">
                                                            {{$notaPeriodos[$m->pk_materia_boletin][$periodo->pk_periodo]}}
                                                        </b>
                                                        @endif
                                                </td>
                                            @endforeach
                                            <td class="P T text-center">{{$m->nota_materia}}</td>
                                        </tr>
                                    @endforeach
                                    <tr  style="border-top: 2px solid #dee2e6 !important;">
                                        <th style="color:#00695c">
                                            Promedio
                                        </th>
                                        @foreach ($infoPeriodos as $periodo)
                                            @foreach ($infoDivs as $div)
                                                <td class="P{{$periodo->nro_periodo}} T text-center" style="display:none"></td>
                                            @endforeach
                                            <td class="P{{$periodo->nro_periodo}} P T text-center">
                                                @if ($puesto[$periodo->pk_periodo]==null)
                                                    {{"-"}}
                                                @else
                                                    {{$puesto[$periodo->pk_periodo]->promedio_periodo}}
                                                @endif
                                                
                                            </td>
                                        @endforeach
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th style="color:#00695c">
                                            Puesto
                                        </th>
                                        @foreach ($infoPeriodos as $periodo)
                                            @foreach ($infoDivs as $div)
                                                <td class="P{{$periodo->nro_periodo}} T text-center" style="display:none"></td>
                                            @endforeach
                                            <td class="P{{$periodo->nro_periodo}} P T text-center">
                                                @if ($puesto[$periodo->pk_periodo]==null)
                                                    {{"-"}}
                                                @else
                                                    {{$puesto[$periodo->pk_periodo]->puesto}}
                                                @endif
                                            </td>
                                            
                                        @endforeach
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th style="color:#00695c">
                                            Inasistencias
                                        </th>
                                        @foreach ($infoPeriodos as $periodo)
                                            @foreach ($infoDivs as $div)
                                                <td class="P{{$periodo->nro_periodo}} T text-center" style="display:none"></td>
                                            @endforeach
                                            <td class="P{{$periodo->nro_periodo}} P T text-center">
                                                {{$inasistencias[$periodo->pk_periodo]}}
                                            </td>
                                        @endforeach
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @switch($boletin->estado)
                            @case('a')
                                <div class="alert alert-success text-center"  role="alert">
                                    <b>Estado: </b>Aprobado
                                </div>
                                @break
                            @case('p')
                                <div class="alert alert-danger text-center"  role="alert">
                                    <b>Estado: </b>Reprobado
                                </div>
                                @break
                            @default 
                                <div class="alert alert-secondary text-center"  role="alert">
                                    <b>Estado: </b>Indefinido <br>
                                    Es posible que el estudiante aun se encuentre cursando el año.
                                </div>
                                
                        @endswitch
                        <br>
                        {{--  tabla   --}}
                            <div class="table-responsive">
                                <table class="table table-hover mr-auto">
                                    <thead>
                                        <tr>
                                            <th colspan="6" class="text-center"> 
                                                CUADRO INFORMATIVO DE RECUPERACIONES 
                                            </th>
                                        </tr>

                                        <tr>
                                            <th rowspan="2" style="color:#014a41;"  class="text-center align-middle">
                                                ÁREAS Y/O ASIGNATURAS
                                            </th>
                                            <th colspan="2" class="text-center" style="color:#014a41;border-left: 2px solid #dee2e6 !important;">
                                                EVALUACIONES
                                            </th>
                                            <th colspan="3" class="text-center" style="color:#014a41;border-left: 2px solid #dee2e6 !important;">
                                                RECUPERACIONES
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" style="color:#00695c;border-left: 2px solid #dee2e6 !important;" class="text-center">
                                                Periodo
                                            </th>
                                            <th scope="col" style="color:#00695c" class="text-center">
                                                Valoración
                                            </th>
                                            <th scope="col" style="color:#00695c;border-left: 2px solid #dee2e6 !important;" class="text-center">
                                                Recup
                                            </th>
                                            <th scope="col" style="color:#00695c" class="text-center">
                                                Acta
                                            </th>
                                            <th scope="col" style="color:#00695c" class="text-center">
                                                Fecha
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recuperaciones as $r)
                                            <tr>
                                                {{-- ÁREAS Y/O ASIGNATURAS --}}
                                                <td>
                                                    {{ucwords($r->nombre)}}
                                                </td>
                                                {{-- Periodo --}}
                                                <td class="text-center" style="border-left: 2px solid #dee2e6 !important;">
                                                    P{{$r->nro_periodo}}
                                                </td>
                                                {{-- Valoración --}}
                                                <td class="text-center">
                                                    {{$r->nota_periodo}}
                                                </td>
                                                {{-- Recup --}}
                                                <td class="text-center" style="border-left: 2px solid #dee2e6 !important;">
                                                    {{$r->nota}}
                                                </td>
                                                {{-- Acta --}}
                                                <td class="text-center">
                                                    {{$r->observaciones}}
                                                </td >
                                                {{-- Fecha --}}
                                                <td class="text-center">
                                                    {{$r->fecha_presentacion}}
                                                </td>
                                            </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        @break
                    @default
                        <h3 class=" card-title text-center">Error</h3>
                @endswitch
            @endif
        </div>
    </div>
    <div class="row text-center mt-4">
        <div class="col-4"></div>
        <div class="col-4">
            <a data-toggle="tooltip" data-placement="top" title="Crear curso" class="btn btn-info text-white" onclick="URLActual()">
                <i class="fas fa-file-pdf"></i>
                <small class="d-none d-sm-block">Ver PDF</small>
            </a>
        </div>
    </div>
</div>
<script type="text/javascript">
function URLActual()
{
    var URLactual = window.location;

    var URLPdf = URLactual + "/pdf";
    window.location.href = URLPdf;

}
    
</script>
@endsection
