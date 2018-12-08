<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    {{-- La variable datos es el array principal y la variable dato
    es el array de materias que por curso --}}
    @foreach ($datos as $llave => $dato)
      <h2>{{$llave}}</h2><br>
      @foreach ($dato as $materia)
        <table border="2">
          <tr>
            <td>{{$materia['materia']}}</td>
            <td>Salon: {{$materia['salon']}}</td>
          </tr>
          <tr>
            <td colspan="2">
              <table border="1">
                <tr>
                  @for ($i=1; $i <= $numeroPeriodos; $i++)
                    <td>Periodo {{$i}}</td>
                  @endfor
                </tr>
                <tr>
                  @foreach ($materia['periodos'] as $periodo)
                    {{-- En la variable nota está toda la info de la nota que sea necesaria --}}
                    <td>
                      @foreach ($periodo as $nota)
                        PK_nota: {{$nota['pk_nota']}} <br>
                      @endforeach
                    </td>
                  @endforeach
                </tr>
              </table>
            </td>
          </tr>
        </table>
      @endforeach
    @endforeach
  </body>
</html>
