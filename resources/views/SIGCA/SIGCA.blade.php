@extends('contenedores.coordinador')
@section('titulo','SIGCA primitivo')
@section('contenedor_coordinador')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center">
        Sistema integrado general de control de asistencias
        </h3>
        <br>
        <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
          <div class="card-header p-0">
            <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
             <h4>
             <i class="fas fa-address-card"></i> Cursos
             </h4>
            </div>
          </div>
          <div class="card-body p-3">
              <div class="row justify-content-center">
                <div class="col-md-10">
                  <div class="form-group mb-2">
                    <label for="cursos"><strong><small style="color : #616161">Cursos disponibles:</small></strong></label>
                  </div>
                  <div class="input-group mb-2">
                    <div class="input group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-user-circle"></i>
                      </span>
                    </div>
                    <select class="form-control form-control-sm" name="pk_curso" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                      <option value="">Curso...</option>
                      @foreach ($cursos as $curso)
                        <option value="/SIGCA/{{$curso->pk_curso}}">{{$curso->generarNombreCurso()}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <br>
        <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
          <div class="card-header p-0">
            <div class="bg-info text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
            @if (!is_array($planilla))
             <h4>
                {{$planilla}}
              </h4>
            @else
              <h4>
                Cursos {{$cursoActual->generarNombreCurso()}}
              </h4>
            </div>
          </div>
          <div class="card-body p-3">
          <table class="table table-striped table-condensed table-hover text-center">
            <thead>
              <tr>
                <th class="center" scope="col" style="color:#00695c">Código</th>
                <th class="center" scope="col" style="color:#00695c">Nombre</th>
                <th class="center" scope="col" style="color:#00695c">Inasistencias</th>
                <th class="center" scope="col" style="color:#00695c">Estado</th>
                <th class="center" scope="col" style="color:#00695c" colspan="3" >Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($planilla['estudiantes'] as $key => $estudiante)
              <tr>
                <td>{{$estudiante->pk_estudiante}}</td>
                <td>{{$estudiante->apellido.' '.$estudiante->nombre}}</td>
                <td>{{$planilla['inasistencias'][$key]}}</td>
                @switch($estudiante->boletin()->estado)
                  @case('a')
                      <td>
                        Aprobado
                      </td>
                      <td>
                         <a onclick="location.href = '/SIGCA/finalizar/{{$estudiante->boletin()->pk_boletin}}/p';" title="Reprobar" data-toggle="tooltip" data-placement="top" > <i class="fas fa-user-times" style="color:#bd2130"></i></a>
                      </td>
                      <td>
                         <a onclick="location.href = '/SIGCA/finalizar/{{$estudiante->boletin()->pk_boletin}}/i';" title="Por determinar" data-toggle="tooltip" data-placement="top" > <i class="fas fa-question" style="color:#17a2b8"></i></a>
                      </td>
                      @break
                  @case('p')
                      <td>
                      Reprobado
                      </td>
                      <td>
                        <a onclick="location.href = '/SIGCA/finalizar/{{$estudiante->boletin()->pk_boletin}}/a';" title="Aprobar" data-toggle="tooltip" data-placement="top" > <i class="fas fa-user-check" style="color:#17a2b8"></i></a>
                      </td>
                      <td>
                      <a onclick="location.href = '/SIGCA/finalizar/{{$estudiante->boletin()->pk_boletin}}/i';" title="Por determinar" data-toggle="tooltip" data-placement="top" > <i class="fas fa-question" style="color:#17a2b8"></i></a>
                      </td>
                        
                      @break
                  @default
                      <td>
                        Por determinar
                      </td>
                      <td>
                      <a onclick="location.href = '/SIGCA/finalizar/{{$estudiante->boletin()->pk_boletin}}/a';" title="Aprobar" data-toggle="tooltip" data-placement="top" > <i class="fas fa-user-check" style="color:#17a2b8"></i></a>
                      </td>
                      <td>
                      <a onclick="location.href = '/SIGCA/finalizar/{{$estudiante->boletin()->pk_boletin}}/p';" title="Reprobar" data-toggle="tooltip" data-placement="top" > <i class="fas fa-user-times" style="color:#bd2130"></i></a>
                      </td>
                  @endswitch
                  <td> <a onclick="location.href = '/estudiantes/{{$estudiante->pk_estudiante}}';" title="Ver" data-toggle="tooltip" data-placement="top" > <i class="fas fa-eye" style="color:#17a2b8"></i></a>
                  </td> 
            </tr>
            @endforeach
            </tbody>
          </table>
          @endif
          </div>
        </div>
    </div>
  </div>
</div>
@endsection