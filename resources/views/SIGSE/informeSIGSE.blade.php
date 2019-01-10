<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Informe SIGSE de {{$infoMateria->getCursoCompleto()}}</title>
  </head>
  <body>
    <h2>Informe SIGSE {{$infoMateria->nombre.' de '.$infoMateria->getCursoCompleto()}}</h2>
    <hr>
    <table>
      <tr>
        <th>Criterio</th>
        <th>Masculino</th>
        <th>Femenino</th>
      </tr>
      @foreach ($informe[0] as $criterio => $generos)
        <tr>
          <td>{{$criterio}}</td>
          <td>{{$generos[0]}}</td>
          <td>{{$generos[1]}}</td>
        </tr>
      @endforeach
    </table>
    <h3>Total de estudiantes: {{$informe[1]}}</h3>
  </body>
</html>
