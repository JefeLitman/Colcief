<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vista primitiva estudiantes concentrador</title>
  </head>
  <body>
    <h1>{{$materia->Materia->nombre}}</h1>
    <h2>{{$materia->Curso->generarNombreCurso()}}</h2>
    <hr>
    <h2>Estudiantes</h2>
    <table border="1">
      <tr>
        <th>#</th>
        <th>Nombres del estudiante</th>
        <th>Código</th>
        @foreach ($periodos as $key => $periodo)
          <th>P{{$key+1}}</th>
        @endforeach
        <th>Prom acum</th>
        <th>Val</th>
        <th>Fin</th>
      </tr>
      @foreach ($estudiantes as $key => $estudiante)
        <tr @if ($estudiante->switch_concentrador)
           bgcolor="orange"
           onclick="window.location='/concentrador/{{$materia->pk_materia_pc}}/{{$estudiante->pk_estudiante}}';"
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
    </table>
  </body>
</html>
