@extends('contenedores.profesor')
@section('titulo','Crear notas')
@section('contenedor_profesor')
{{-- mensajes de error --}}

<br>
<div class="container">
    <div class="row justify-content-center" style="background-color: #fafafa !important;">
        <div class="col-md-10">
            <form class="" action="/notas" method="post">
            @csrf
            <div class="card border-primary rounded-0" style="border-color:#17a2b8 !important; border-radius:0.25rem !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2" style="background-color:rgba(0,0,0,.03) !important;">
                        <h4 style="color:#212529 !important;"><i class="fas fa-book-open"></i> Crear nota</h4>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        {{-- Componente --}}
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">Componente</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class= "input-group-text">
                                            <i class="fas fa-boxes"></i></i>
                                        </span>
                                    </div>
                                    <select class="custom-select custom-select-sm" name="fk_division" required>
                                        <option>Seleccionar componente</option>
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
                                <label for="cedula"><strong><small style="color : #616161">Materia - Curso</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-chalkboard-teacher"  ></i>
                                        </span>
                                    </div>
                                    {{--  Se utilizo el disabled y el hidden porque si se colocaba solo el disabled no llegaba la información a la base de datos... y al colocar hidden oculta select que se encarga de enviar la información db --}}
                                    {{--  DISABLED  --}}
                                    <select class="custom-select custom-select-sm" name="fk_materia_pc" required disabled>
                                        {{--  <option>Seleccionar materia - salón </option>  --}}
                                        @for ($i=0; $i < count($materias); $i++)
                                            <option value="{{$materias[$i][0]['pk_materia_pc']}}">{{$materias[$i][0]['nombre'].' Curso: '.$materias[$i][1]}}</option>
                                        @endfor
                                    </select>
                                    {{--  HIDDEN  --}}
                                    <select class="custom-select custom-select-sm" name="fk_materia_pc" required hidden>
                                        {{--  <option>Seleccionar materia - salón </option>  --}}
                                        @for ($i=0; $i < count($materias); $i++)
                                          <option value="{{$materias[$i][0]['pk_materia_pc']}}">{{$materias[$i][0]['nombre'].' Curso: '.$materias[$i][1]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Nombre de la nota --}}
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">Nombre de la nota</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-book"  ></i>
                                        </span>
                                    </div>
                                    <input class="form-control form-control-sm" type="text" placeholder="[máx 20 caracteres]"
                                    name="nombre" value="{{old('nombre')}}">
                                </div>
                            </div>
                        </div>

                        {{-- porcentaje --}}
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">Porcentaje</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-percentage"  ></i>
                                        </span>
                                    </div>
                                    <input type="number"
                                    class="form-control form-control-sm"
                                    placeholder="[número entero]"
                                    name="porcentaje" value="{{old('porcentaje')}}">
                                </div>
                            </div>
                        </div>

                        {{-- Periodos --}}
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="cedula"><strong><small style="color : #616161">Periodos</small></strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt"  ></i>
                                        </span>
                                    </div>
                                    <select class="custom-select custom-select-sm" name="fk_periodo" required>
                                        <option>Seleccionar el periodo</option>
                                        @foreach ($periodos as $periodo)
                                            <option value="{{$periodo['pk_periodo']}}">{{$periodo['nro_periodo']}}</option>
                                        @endforeach
                                    </select>
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
                                            <i class="fas fa-marker"  ></i>
                                        </span>
                                    </div>
                                    <textarea class="form-control form-control-sm" placeholder="[máx 255 caracteres]" name="descripcion" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="action" value="Enviar" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;">
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
