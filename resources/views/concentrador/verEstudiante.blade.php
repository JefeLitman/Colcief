<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Relleno</h2>
    <hr>
    <h3>NOTAS</h3>
    <form class="" action="/concentrador" method="post">
      <input type="hidden" name="pk_estudiante" value="{{$estudiante->pk_estudiante}}">
      <input type="hidden" name="pk_materia_pc" value="{{$materia->pk_materia_pc}}">
      @csrf
      <table border="1">
        <tr>
          @foreach ($periodos as $key => $periodo)
            <th>P{{$key+1}}</th>
          @endforeach
        </tr>
        <tr>
          @foreach ($periodos as $numero => $periodo)
            <td> <input name="periodos[{{$notas[$numero]->pk_nota_periodo}}]"
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
      </table>
      <input type="submit" name="enviar" value="Guardar cambios">
    </form>
  </body>
</html>
