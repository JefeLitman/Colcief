<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crear periodo</title>
  </head>
  <body>
    <form class="" action="{{route('periodos.update', $periodo->pk_periodo)}}" method="post">
      @csrf
      {{ method_field('PATCH') }}
      <label for="">Fecha de inicio</label>
      <input type="date" name="fecha_inicio" value="{{$periodo->fecha_inicio}}"><br>
      <label for="">Fecha límite</label>
      <input type="date" name="fecha_limite" value="{{$periodo->fecha_limite}}"><br>
      <label for="">Año</label>
      <input type="number" name="ano" value="{{$periodo->ano}}"><br>
      <label for="">Número de periodo</label>
      <input type="number" name="nro_periodo" value="{{$periodo->nro_periodo}}"><br>
      <input type="submit" name="" value="Enviar">
    </form>
    @foreach ($errors->all() as $message)
        <p> Error {{$message}} </p>
    @endforeach
  </body>
</html>
