<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Primitivo crear acudiente</title>
  </head>
  <body>
    <h2>VISTA PROVISIONAL Y EXCLUSIVA PARA PRUEBAS</h2>
    <br>
    <form class="" action="/acudientes" method="post">
      @csrf
      Clave primaria [integer] <br>
      <input type="text" name="pk_acudiente" value="@if (!in_array('pk_acudiente',$errors->getBag('default')->keys())) {{old('pk_acudiente')}} @endif">
      <br>
      Nombre acudiente 1 [string] <br>
      <input type="text" name="nombre_acu_1" value="">
      <br>
      Dirección del acudiente 1 [string] <br>
      <input type="text" name="direccion_acu_1" value="">
      <br>
      Telefono acudiente 1 [string (númerico)] <br>
      <input type="text" name="telefono_acu_1" value="@if (!in_array('telefono_acu_1',$errors->getBag('default')->keys())) {{old('telefono_acu_1')}} @endif">
      <br>
      Nombre acudiente 2 [string] <br>
      <input type="text" name="nombre_acu_2" value="">
      <br>
      Dirección del acudiente 2 [string] <br>
      <input type="text" name="direccion_acu_2" value="">
      <br>
      Telefono acudiente 2 [string (numérico)] <br>
      <input type="text" name="telefono_acu_2" value="">
      <br>
      <!-- <select class="" name="Prueba">
        <option value="o1">1</option>
        <option value="o2">2</option>
      </select> -->
      <input type="submit" name="" value="Enviar">
    </form>
    @foreach ($errors->all() as $message)
        <p> Error {{$message}} </p>
    @endforeach
  </body>
</html>
