@extends('contenedores.'.((session('role')=='administrador')?'admin':(session('role'))))
@section('contenedor_'.((session('role')=='administrador')?'admin':(session('role'))))
@section('titulo','Concentrador del estudiante')
<div class="container" style="background:#fafafa !important;">
  <div class="row justify-content-center">
    <div class="col-md-11">
        <h1 class="text-center">Estudiante</h1>
        <h3 class="text-center">{{$estudiante->nombre}} {{$estudiante->apellido}}</h1>
      <hr>
      <div class="card bg-light border-info">
        <h4 class="card-header text-center">NOTAS</h4>
        <div class="card-body">
        <form class="" action="/concentrador" method="post">
          <input type="hidden" name="pk_estudiante" value="{{$estudiante->pk_estudiante}}">
          <input type="hidden" name="pk_materia_pc" value="{{$materia->pk_materia_pc}}">
          @csrf
          <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover text-center">
              <thead>
                <tr>
                  @foreach ($periodos as $key => $periodo)
                    <th class="center" scope="col" style="color:#00695c">P{{$key+1}}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach ($periodos as $numero => $periodo)
                    <td class="text-center"><input class="form-control form-control-sm" name="periodos[{{$notas[$numero]->pk_nota_periodo}}]"
                      @if (strtotime(date('d-m-Y'))>=strtotime($periodo->recuperacion_limite))
                        type = "number"
                        value = "{{$notas[$numero]->nota_periodo}}"
                        min = "0.0"
                        max = "5.0"
                        step = "0.1"
                      @else
                        type = "text"
                        value = "No ha empezado/terminado"
                        disabled
                      @endif
                        ></td>
                  @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      <br>
          <input type="submit" name="enviar" value="Guardar cambios" class=" btn btn-success btn-block" style="width:100% !important; background-color:  #17a2b8 !important; border-color:  #17a2b8 !important;">
      </div>
    </div>
  </div>
  </form>
</div>
@endsection
