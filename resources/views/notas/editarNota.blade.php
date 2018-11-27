@extends('contenedores.profesor')
@section('titulo','Editar notas')
@section('contenedor_profesor')
{{-- mensajes de error --}}
@include('error.error')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <form class="" action="{{route('notas.update', $nota['pk_nota'])}}" method="post">
            {{ method_field('PATCH') }}
            @csrf
            <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                        <h4><i class="fas fa-book-open"></i> Editar nota</h4>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        {{-- Division --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
                                        <i class="fas fa-boxes"></i></i>
                                    </span>
                                </div>
                                <select class="custom-select custom-select-sm" name="fk_division" required>
                                    @foreach ($divisiones as $division)
                                        <option value="{{$division['pk_division']}}" @if ($division['pk_division']==$nota['fk_division'])
                                        selected
                                        @endif >{{$division['nombre']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- materia y salon --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </span>
                                </div>
                                <select class="custom-select custom-select-sm" name="fk_materia_pc" required>
                                    @foreach ($materias as $materia)
                                        <option value="{{$materia['pk_materia_pc']}}">{{$materia['nombre'].' Salón: '.$materia['salon']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Nombre de la nota --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </span>
                                </div>
                                <input class="form-control form-control-sm" type="text" placeholder="Nombre de la nota [máx 20 caracteres]"
                                name="nombre" value="{{$nota['nombre']}}">
                            </div>
                        </div>

                        {{-- porcentaje --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-percentage"></i>
                                    </span>
                                </div>
                                <input type="number"
                                class="form-control form-control-sm"
                                placeholder="Porcentaje [número entero]"
                                name="porcentaje" value="{{$nota['porcentaje']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-marker"></i>
                                    </span>
                                </div>
                                <textarea class="form-control form-control-sm" placeholder="Descripción de la nota [máx 255 caracteres]" name="descripcion" >{{$nota['descripcion']}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="action" value="Enviar" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
    {{-- <form class="" action="{{route('notas.update', $nota['pk_nota'])}}" method="post">
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
    @endforeach --}}
@endsection
