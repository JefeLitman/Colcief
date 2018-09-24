<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ver Periodo</title>
  </head>
  <body>
    <!-- Esta vista muestra todos los datos de un objeto 
    periodo, si se accede al index devolverá todos los periodos
    si se accede al endpoint con un id, ej: /periodo/{id} devolverá
    solo los datos del periodo {id}
    By: Douglas -->
    @foreach ($periodo->all() as $p)
    <p>Periodo #: {{$p->nro_periodo}}</p>
    <p>Comprende entre: {{$p->fecha_inicio}} y {{$p->fecha_limite}} </p>
    <p>Año vigente: {{$p->ano}}</p>
    <hr>
    @endforeach
  </body>
</html>
