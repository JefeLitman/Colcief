<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Aquí va una vista bonita</h2>
    @foreach ($acudientes->all() as $acudiente)
      <p>Clave primaria: {{$acudiente->pk_acudiente}}</p>
      <p>Nombre del primer acudiente: {{$acudiente->nombre_acu_1}}</p>
      <p>Dirección del primer acudiente: {{$acudiente->direccion_acu_1}}</p>
      <p>Telefono del primer acudiente: {{$acudiente->telefono_acu_1}}</p>
      <p>Nombre del segundo acudiente: {{$acudiente->nombre_acu_2}}</p>
      <p>Dirección del segundo acudiente: {{$acudiente->direccion_acu_2}}</p>
      <p>Telefono del segundo acudiente: {{$acudiente->telefono_acu_2}}</p>
      <p>Fecha de registro: {{$acudiente->created_at}}</p>
      <hr>
    @endforeach
  </body>
</html>
