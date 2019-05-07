@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo','Concentrador de estudiantes')
<div class="container" style="background:#fafafa !important;">
  <div class="row justify-content-center">
    <div class="col-md-11 text-center">
      <h1>{{$materia->Materia->nombre}}</h1>
      <h2>{{$materia->Curso->generarNombreCurso()}}</h2>
      <hr>
      <div class="card bg-light border-info">
        <h4 class="card-header text-center" style="color:#03424c">Estudiantes</h4>
      <div class="card-body">
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-condensed table-hover text-center">
          <thead>
          <tr>
            <th class="center" scope="col" style="color:#00695c">#</th>
            <th class="center" scope="col" style="color:#00695c">Nombres del estudiante</th>
            <th class="center" scope="col" style="color:#00695c">Código</th>
            @foreach ($periodos as $key => $periodo)
              <th class="center" scope="col" style="color:#00695c">P{{$key+1}}</th>
            @endforeach
            <th class="center" scope="col" style="color:#00695c">Prom acum</th>
            <th class="center" scope="col" style="color:#00695c">Val</th>
            <th class="center" scope="col" style="color:#00695c">Fin</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($estudiantes as $key => $estudiante)
            <tr @if ($estudiante->switch_concentrador)
              bgcolor="orange"
              
              onclick="window.location='/concentrador/{{$materia->pk_materia_pc}}/{{$estudiante->pk_estudiante}}';"
              style="cursor:pointer; !important" 
              @endif>
              <td>{{$key+1}}</td>
              <td>{{$estudiante->apellido.' '.$estudiante->nombre}}</td>
              <td>{{$estudiante->pk_estudiante}}</td>
              @foreach ($periodos as $keyp => $periodo)
                @foreach ($notas[$estudiante->pk_estudiante] as $arrayPeriodos)
                  <td>
                    @if (strtotime(date('d-m-Y'))>=strtotime($periodo->recuperacion_limite))
                      {{$arrayPeriodos[$keyp]->nota_periodo}}
                    @else
                      NE/T
                    @endif
                </td>
                @endforeach
              @endforeach
              <td>{{$estudiante->nota_materia}}</td>
              <td>algo</td>
              <td>algo</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection