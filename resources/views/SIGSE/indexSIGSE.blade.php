<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SIGSE</title>
  </head>
  <body>
    <form class="" action="/SIGSE" method="post">
      {{ csrf_field() }}
      <label>Materias del profesor</label><br>
      <select class="" name="MateriasPC">
        @foreach ($MateriasPC as $pk_materia_pc => $MateriaPC)
          <option value="{{$pk_materia_pc}}">{{$MateriaPC[0].' de '.$MateriaPC[1]}}</option>
        @endforeach
      </select>
      <br>
      <input type="submit" name="enviar" value="Generar informe">
    </form>
  </body>
</html>
