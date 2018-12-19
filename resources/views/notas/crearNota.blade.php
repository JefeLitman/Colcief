@extends('contenedores.profesor')
@section('titulo','Crear notas')
@section('contenedor_profesor')
{{-- mensajes de error --}}

<br>
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-10">
            <form class="" action="/notas" method="post">
            @csrf
            <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                        <h4><i class="fas fa-book-open"></i> Crear nota</h4>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        {{-- Division --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">División</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class= "input-group-text">
                                            <i class="fas fa-boxes"></i></i>
                                        </span>
                                    </div>
                                    <select class="custom-select custom-select-sm" name="fk_division" required>
                                        <option>Seleccionar división</option>
                                        @foreach ($divisiones as $division)
                                            <option value="{{$division['pk_division']}}">{{$division['nombre']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- materia y salon --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">Materia y Salón</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                        </span>
                                    </div>
                                    <select class="custom-select custom-select-sm" name="fk_materia_pc" required>
                                        <option>Seleccionar materia - salón </option>
                                        @foreach ($materias as $materia)
                                            <option value="{{$materia['pk_materia_pc']}}">{{$materia['nombre'].' Salón: '.$materia['salon']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Nombre de la nota --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">Nombre de la nota</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-book"></i>
                                        </span>
                                    </div>
                                    <input class="form-control form-control-sm" type="text" placeholder="[máx 20 caracteres]"
                                    name="nombre" value="{{old('nombre')}}">
                                </div>
                            </div>
                        </div>

                        {{-- porcentaje --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">Porcentaje</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-percentage"></i>
                                        </span>
                                    </div>
                                    <input type="number"
                                    class="form-control form-control-sm"
                                    placeholder="[número entero]"
                                    name="porcentaje" value="{{old('porcentaje')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{--  descripción  --}}
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">Descripción</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-marker"></i>
                                        </span>
                                    </div>
                                    <textarea class="form-control form-control-sm" placeholder="[máx 255 caracteres]" name="descripcion" ></textarea>
                                </div>
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
    {{-- <form class="" action="/notas" method="post">
      @csrf
      <label for="">Fk_Division</label>
      <select name="fk_division" required>
        @foreach ($divisiones as $division)
          <option value="{{$division['pk_division']}}">{{$division['nombre']}}</option>
        @endforeach
      </select><br>
      <label for="">Fk_MateriaPC</label>
      <select name="fk_materia_pc" required>
        @foreach ($materias as $materia)
          <option value="{{$materia['pk_materia_pc']}}">{{$materia['nombre'].' Salón: '.$materia['salon']}}</option>
        @endforeach
      </select><br>
      <label for="">Nombre de la nota [20 chars max]</label>
      <input type="text" name="nombre" value="{{old('nombre')}}"><br>
      <label for="">Descripción [255 chars max]</label>
      <input type="text" name="descripcion" value="{{old('descripcion')}}"><br>
      <label for="">Porcentaje (%) [numero entero 1->100]</label>
      <input type="number" name="porcentaje" value="{{old('porcentaje')}}"><br>
      <input type="submit" name="" value="Enviar">
    </form>
    @foreach ($errors->all() as $message)
        <p> Error {{$message}} </p>
    @endforeach --}}
@endsection
