<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Primitivo editar acudiente</title>
  </head>
  <body>
    <h2>VISTA PROVISIONAL Y EXCLUSIVA PARA PRUEBAS</h2>
    <br>
    <form class="" action="{{route('acudientes.update', $acudiente->pk_acudiente)}}" method="post">
      {{ method_field('PATCH') }}
      @csrf
      Clave primaria [integer] <br>
      <input type="text" name="pk_acudiente" value="{{$acudiente->pk_acudiente}}">
      <br>
      Nombre acudiente 1 [string] <br>
      <input type="text" name="nombre_acu_1" value="{{$acudiente->nombre_acu_1}}">
      <br>
      Dirección del acudiente 1 [string] <br>
      <input type="text" name="direccion_acu_1" value="{{$acudiente->direccion_acu_1}}">
      <br>
      Telefono acudiente 1 [string (númerico)] <br>
      <input type="text" name="telefono_acu_1" value="{{$acudiente->telefono_acu_1}}">
      <br>
      Nombre acudiente 2 [string] <br>
      <input type="text" name="nombre_acu_2" value="{{$acudiente->nombre_acu_2}}">
      <br>
      Dirección del acudiente 2 [string] <br>
      <input type="text" name="direccion_acu_2" value="{{$acudiente->direccion_acu_2}}">
      <br>
      Telefono acudiente 2 [string (numérico)] <br>
      <input type="text" name="telefono_acu_2" value="{{$acudiente->telefono_acu_2}}">
      <br>
      <input type="submit" name="" value="Enviar">
    </form>
    @foreach ($errors->all() as $message)
        <p> Error {{$message}} </p>
    @endforeach
  </body>
</html>
