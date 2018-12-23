<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border="2">
      <tr>
        <th>Componente</th>
        <th>Notas pertenecientes al corte</th>
      </tr>
      @foreach ($divisiones as $nombre => $division)
        <tr>
          <td>{{$nombre}}</td>
          <td>
            <table>
              <tr>
                <th>Pk_nota</th>
                <th>Nombre nota</th>
                <th>Porcentaje</th>
              </tr>
              @foreach ($division as $nota)
                <tr>
                  <td>{{$nota['pk_nota']}}</td>
                  <td>{{$nota['nombre']}}</td>
                  <td>{{$nota['porcentaje']}}</td>
                </tr>
              @endforeach
            </table>
          </td>
        </tr>
      @endforeach
    </table>
  </body>
</html>
