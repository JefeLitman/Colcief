<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Primitivo crear acudiente</title>
  </head>
  <body>
    <form class="" action="/acudiente" method="post">
      @csrf
      <input type="text" name="pk_acudiente" value="">
      <br>
      <input type="text" name="nombre_acu_1" value="">
      <br>
      <input type="text" name="direccion_acu_1" value="">
      <br>
      <input type="text" name="telefono_acu_1" value="">
      <br>
      <input type="text" name="nombre_acu_2" value="">
      <br>
      <input type="text" name="direccion_acu_2" value="">
      <br>
      <input type="text" name="telefono_acu_2" value="">
      <br>
      <select class="" name="Prueba">
        <option value="o1">1</option>
        <option value="o2">2</option>
      </select>
      <input type="submit" name="" value="Enviar">
    </form>
    <?php
    foreach ($errors->get('pk_acudiente') as $message) {
        echo $errors;
    }
     ?>
  </body>
</html>
