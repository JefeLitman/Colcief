<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Aquí va una vista bonita</h2>
    @foreach ($datos as $dato)
      <p>pk_nota: {{$dato[0]['pk_nota']}}</p>
      <p>nombre: {{$dato[0]['nombre']}}</p>
      <p>descripcion: {{$dato[0]['descripcion']}}</p>
      <p>porcentaje: {{$dato[0]['porcentaje']}}</p>
      <table border="1">
        <tr>
          <th colspan="2">Nombre división: {{$dato[1]['nombre']}}</th>
        </tr>
        <tr>
          <td>pk_division: {{$dato[0]['fk_division']}}</td>
          <td>descripcion: {{$dato[1]['descripcion']}}</td>
        </tr>
        <tr>
          <th colspan="2">Nombre materiaPC: {{$dato[2]['nombre']}}</th>
        </tr>
        <tr>
          <td colspan="2">fk_materia: {{$dato[2]['fk_materia']}}</td>
        </tr>
      </table>
      <hr>
    @endforeach
  </body>
</html>
