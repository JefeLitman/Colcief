<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Aquí va una vista bonita</h2>
      <p>Clave primaria: {{$acudiente->pk_acudiente}}</p><br>
      <p>Nombre del primer acudiente: {{$acudiente->nombre_acu_1}}</p><br>
      <p>Dirección del primer acudiente: {{$acudiente->direccion_acu_1}}</p><br>
      <p>Telefono del primer acudiente: {{$acudiente->telefono_acu_1}}</p><br>
      <p>Nombre del segundo acudiente: {{$acudiente->nombre_acu_2}}</p><br>
      <p>Dirección del segundo acudiente: {{$acudiente->direccion_acu_2}}</p><br>
      <p>Telefono del segundo acudiente: {{$acudiente->telefono_acu_2}}</p><br>
      <p>Fecha de registro: {{$acudiente->created_at}}</p>
  </body>
</html>
