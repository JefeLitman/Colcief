@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Estudiantes/Grado')
{{-- Envio ["msj"=>$msj,"boletin"=>$B[0],"materias"=>$materias,"infoPeriodos"=>$infoPeriodos,"notaPeriodos"=>$notaPeriodos,"infoDivs"=>$infoDivs,"notasDiv"=>$notaDivs] --}}

<br>
<div class="container">
    @if ($msj == 1)
        <h3 class="text-center"> No hay estudiantes o boletines correspondientes</h3>
    @else
        {{-- Solo el boletin aparece, curso y en si defecto estudiante sin materias asignadas --}}
        {{-- El encabezado es comun para el 2 y 3 por eso realicé asi la estructura --}}
        <h3 class='text-center'> Boletin {{$boletin->ano}}</h3>
        <b> Estudiante:</b> {{$boletin->nombre}} {{$boletin->apellido}} <br>
        <b> Fecha de nacimiento:</b> {{$boletin->fecha_nacimiento}} <br>
        <b> Discapasidad:</b> {{($boletin->discapacidad)?"Si":"No"}} <br>
        <b> Curso:</b> {{($boletin->prefijo==0)?Preescolar:$boletin->prefijo}} - {{$boletin->sufijo}}<br> <br>
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
        <b> Ver: </b>
        <select name="periodo" id="periodo" onchange="cambioPeriodo(this.value)">
            @foreach ( $infoPeriodos as $p )
                <option value="P{{$p->nro_periodo}}">Periodo {{$p->nro_periodo}}</option>
            @endforeach
            <option value="P" selected>Todos los periodos</option>
        </select><br><br>
        @switch($msj)
            @case(2)
                <h4> NOTAS </h4>
                <h3 class="text-center">No hay materias matriculadas para el grado de este estudiante.</h3>
                @break
            @case(3)
                <div class="table-responsive" >
                    <table class="table table-hover mr-auto" id="myTable">
                        <thead>
                            {{-- Cabecero tabla --}}
                            <tr>
                                <th scope="col" style="color:#00695c" >Materias</th>
                                @foreach ($infoPeriodos as $periodo)
                                    @foreach ($infoDivs as $div)
                                            <th class="P{{$periodo->nro_periodo}} T" scope="col" style="color:#00695c;display:none;">{{$div->nombre}} ({{$div->porcentaje}}%)</th>
                                    @endforeach
                                    <th class="P{{$periodo->nro_periodo}} P T" scope="col" style="color:#00695c">Nota P{{$periodo->nro_periodo}}</th>
                                    <th class="P T" scope="col" style="color:#00695c">Nota final</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Contenido Tabla --}}
                            @foreach ($materias as $m)
                                <tr>
                                    <td>{{$m->nombre}}</td>
                                    @foreach ($infoPeriodos as $periodo)
                                        @foreach ($infoDivs as $div)
                                            <td class="P{{$periodo->nro_periodo}} T" style="display:none">{{$notaDivs[$m->pk_materia_boletin][$periodo->pk_periodo][$div->pk_division] or "-"}}{{--Info: Echoing Data If It Exists -> https://laravel.com/docs/5.1/blade --}}</td>
                                        @endforeach
                                        <td class="P{{$periodo->nro_periodo}} P T">{{$notaPeriodos[$m->pk_materia_boletin][$periodo->pk_periodo] or "-"}}</td>
                                    @endforeach
                                    <td class="P T">{{$m->nota_materia or "-"}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @break
            @default
                <h3 class="text-center">Error</h3>
        @endswitch
    @endif
</div>
@endsection