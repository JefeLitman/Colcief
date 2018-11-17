<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crear notas</title>
  </head>
  <body>
    <form class="" action="{{route('notas.update', $nota['pk_nota'])}}" method="post">
      {{ method_field('PATCH') }}
      @csrf
      <label for="">Fk_Division</label>
      <select name="fk_division" required>
        @foreach ($divisiones as $division)
          <option value="{{$division['pk_division']}}" @if ($division['pk_division']==$nota['fk_division'])
            selected
          @endif >{{$division['nombre']}}</option>
        @endforeach
      </select><br>
      <label for="">Fk_MateriaPC</label>
      <select name="fk_materia_pc" required>
        @foreach ($materias as $materia)
          <option value="{{$materia['pk_materia_pc']}}">{{$materia['nombre'].' Salón: '.$materia['salon']}}</option>
        @endforeach
      </select><br>
      <label for="">Nombre de la nota [20 chars max]</label>
      <input type="text" name="nombre" value="{{$nota['nombre']}}"><br>
      <label for="">Descripción [255 chars max]</label>
      <input type="text" name="descripcion" value="{{$nota['descripcion']}}"><br>
      <label for="">Porcentaje (%) [numero entero 1->100]</label>
      <input type="number" name="porcentaje" value="{{$nota['porcentaje']}}"><br>
      <input type="submit" name="" value="Enviar">
    </form>
    @foreach ($errors->all() as $message)
        <p> Error {{$message}} </p>
    @endforeach
  </body>
</html>
