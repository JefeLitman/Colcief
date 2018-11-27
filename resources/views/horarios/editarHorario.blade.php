@extends('contenedores.admin')
@section('titulo','Estudiante Nuevo')
@section('contenedor_admin')
    @include('error.error')
<br id = "br">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="card-title text-center">
                Editar horario
            </h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h4 class="card-title text-center">
                <i class="fas fa-book"></i> <br> {{$horario->nombre_materia}}
            </h4>
        </div>
        <div class="col-md-4">
            <h4 class="card-title text-center">
                <i class="fas fa-chalkboard"></i><br>
                {{$horario->prefijo}}-{{$horario->sufijo}}
            </h4>
        </div>
        <div class="col-md-4">
            <h4 class="card-title text-center">
                <i class="fas fa-user-tie"></i><br>
                {{$horario->nombre}} {{$horario->apellido}}
            </h4>
        </div>
    </div>

  @if(session()->has('error'))
      <script src = "{{asset('js/ajax.js')}}"></script>
      <script> newModal('Problemas',
              'No se pueden actualizar los siguientes horario debido a los siguientes problemas:<br><br>'+
              '<ul>'+
                  '@foreach(session()->get('error') as $error)'+
                      '<li>{{$error}}</li>'+
                  '@endforeach'+
              '</ul>', false
          );
      </script>
  @endif

  <br>
  <form enctype="multipart/form-data" action="{{route('horarios.update', $horario->pk_horario)}}" method="POST">
    @csrf
    @method("PUT")
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
              <th scope="col" class="text-center">Día</th>
              <th scope="col" class="text-center">Hora inicio</th>
              <th scope="col" class="text-center">Hora fin
              </th>
          </tr>
        </thead>
        <tbody id="div">
            <tr id="index">
              <input type="hidden" name = "pk_horario" id = "pk_horario" value = "{{$horario->pk_horario}}">
              <th scope="row">
                <select class="custom-select custom-select-sm" name="dia" id="dia" value="{{old('dia(field.i)')}}" required>
                  <option value="" disabled selected>Seleccionar día</option>
                  <option @select('dia', 'lunes') @endselect value="lunes" {{$horario->dia === "lunes" ? 'selected' : '' }}>Lunes</option>
                  <option @select('dia', 'martes') @endselect value="martes" {{$horario->dia === "martes" ? 'selected' : '' }}>Martes</option>
                  <option @select('dia', 'miercoles') @endselect value="miercoles" {{$horario->dia === "miercoles" ? 'selected' : '' }}>Miercoles</option>
                  <option @select('dia', 'jueves') @endselect value="jueves" {{$horario->dia === "jueves" ? 'selected' : '' }}>Jueves</option>
                  <option @select('dia', 'viernes') @endselect value="viernes" {{$horario->dia === "viernes" ? 'selected' : '' }}>Viernes</option>
                </select>
              </th>
              <td>
                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="{{$horario->hora_inicio}}" min="07:00" max="15:00" step = "300" required>
              </td>
              <td>
                <input type="time" class="form-control" id="hora_fin" name="hora_fin" value="{{$horario->hora_fin}}" min="08:00" max="16:00" step = "300" required>
              </td>
            </tr>
        </tbody>
      </table>
    </div>
    <input type="hidden" value = "{{$horario->fk_curso}}" name = "curso">
    <input type="hidden" value = "{{$horario->fk_empleado}}" name = "empleado">

    <div class="row justify-content-center">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <button class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #0277bd !important; border-color: #0277bd !important; width: 40%;" type="submit" name="action">
          Actualizar
        </button>
      <div class="col-md-4"></div>
      </div>
    </div>
  </form>
</div>
<script>
  $("#hora_inicio").on("focusout", function(){
    var hora_inicio = document.getElementById("hora_inicio").value;
    document.getElementById("hora_fin").value = hora_inicio;
    document.getElementById("hora_fin").stepUp(12);
  });
</script>

<br>
@endsection
