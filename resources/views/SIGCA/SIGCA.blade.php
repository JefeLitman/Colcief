<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SIGCA primitivo</title>
  </head>
  <body>
    <h3>Sistema integrado general de control de asistencias</h3>
    <hr>
    <table>
      <tr>
        <th colspan="2">Cursos</th>
      </tr>
      <tr>
        <td>Cursos disponibles:</td>
        <td> <select class="" name="pk_curso" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
          <option value="">Curso...</option>
          @foreach ($cursos as $curso)
            <option value="/SIGCA/{{$curso->pk_curso}}">{{$curso->generarNombreCurso()}}</option>
          @endforeach
        </select> </td>
      </tr>
    </table>
    @if (!is_array($planilla))
      <h4>{{$planilla}}</h4>
    @else
      <hr>
      <h3>Curso {{$cursoActual->generarNombreCurso()}}</h3>
      <h3>Estudiantes:</h3>
      <table>
        <tr>
          <th>Código</th>
          <th>Nombre</th>
          <th>Inasistencias</th>
          <th>Acciones</th>
        </tr>
        <tr>
          @foreach ($planilla['estudiantes'] as $key => $estudiante)
            <td>{{$estudiante->pk_estudiante}}</td>
            <td>{{$estudiante->apellido.' '.$estudiante->nombre}}</td>
            <td>{{$planilla['inasistencias'][$key]}}</td>
            <td><a href="/estudiantes/{{$estudiante->pk_estudiante}}">Ver</a> <button type="button" name="button">Rajar</button></td>
          @endforeach
        </tr>
      </table>
    @endif
  </body>
</html>
