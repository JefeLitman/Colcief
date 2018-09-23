<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crear periodo</title>
  </head>
  <body>
    <form class="" action="/periodo" method="post">
      @csrf
      <label for="">Fecha de inicio</label>
      <input type="date" name="fecha_inicio" value=""><br>
      <label for="">Fecha límite</label>
      <input type="date" name="fecha_limite" value=""><br>
      <label for="">Año</label>
      <input type="number" name="ano" value=""><br>
      <label for="">Número de periodo</label>
      <input type="number" name="nro_periodo" value=""><br>
      <input type="submit" name="" value="Enviar">
    </form>
  </body>
</html>
