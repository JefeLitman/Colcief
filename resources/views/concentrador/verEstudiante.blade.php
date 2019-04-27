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
      <table border="1">
        <tr>
          @foreach ($periodos as $key => $periodo)
            <th>P{{$key+1}}</th>
          @endforeach
        </tr>
        <tr>
          @foreach ($notas as $notaPeriodo)
            <td> <input type="text" name="{{$notaPeriodo->fk_periodo}}" value="{{$notaPeriodo->nota_periodo}}"> </td>
          @endforeach
        </tr>
      </table>
      <input type="submit" name="enviar" value="Guardar cambios">
    </form>
  </body>
</html>
