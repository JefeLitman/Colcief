@extends('contenedores.admin')
@section('titulo','Editar estudiante')
@section('contenedor_principal')
<div class="row">
    <div class="col s2"></div>
	<div class="col s8 center"><br>
		@if ($errors->any())
            <div id="modal1" class="modal">
                <div class="row">
                    <div class="col s1"></div>
                    <div class="col s10">
                        <br>
                        <div class="card cyan lighten-5">
                            <div class="modal-content center">
                                <h4>Falta</h4>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="modal-close center">
                            <a href="#!" class="btn waves-effect cyan darken-3">Cerrar</a>
                        </div>
                    </div>
                </div>
            </div>
    @endif
        <div class="card green lighten-5">
            <div class="card-content">
					<form enctype="multipart/form-data" action="{{route('estudiantes.update', $estudiante->pk_estudiante)}}" method="POST">
					@csrf
					@method("PUT")
                    <h4 class="center">Datos Estudiante</h4>
                    <div class="divider"></div>
        
                    
					<div class="row">
                        <div class="col s3"></div>
						<div class="input-field col s6">
							<img style="" src="{{Storage::url($estudiante->foto)}}" onclick="$('#modal2').modal('open');">
                            <a class="btn waves-effect waves-teal ">
                                <i class="material-icons" onclick="$('#modal2').modal('open');">add_a_photo</i>
                            </a>
                        </div>
                    </div>
                     <!-- Modal Structure -->
                    <div id="modal2" class="modal open">
                        <div class="modal-content">
                            <h4>Cargar Imagen</h4>
                            <div class="file-field input-field">
                                    <div class="btn cyan darken-3 waves-effect">
                                        <span>Seleccionar</span>
                                        <input type="file" name="foto">
                                    </div>
                                    <div class="file-path-wrapper">{{-- file-path-wrapper es para mostrar el nombre la foto que subio y verificar que subio --}}
                                        <input class="file-path validate" type="text">
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Descartar</a>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Subir</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" name="nombre" value="{{$estudiante->nombre}}" required>
                            <label>Nombres <label class="rojo">*</label> </label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="apellido" value="{{$estudiante->apellido}}" required>
                            <label>Apellido <label class="rojo">*</label> </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" name="fecha_nacimiento" class="datepicker" id="datepicker" value="{{$estudiante->fecha_nacimiento}}" required>
                            <label>Fecha de nacimiento <label class="rojo">*</label></label>
                        </div>
                        
                        <div class="input-field col s4">
                                
                            <select name="grado" required>
							  <option value="" disabled>Seleccionar</option>
							  @php $grado=["Preescolar","Primero","Segundo","Tercero","Cuarto","Quinto","Sexto","Septimo","Octavo","Noveno","Decimo","Once"]
							  @endphp
							  @foreach ($grado as $i=>$value)
								@if (intval($estudiante->grado)==$i)
									<option value="{{$i}}" selected>{{$value}}</option>
								@else
									<option value="{{$i}}">{{$value}}</option>
								@endif
							  @endforeach
                            </select>
                            <label>Grado <label class="rojo">*</label></label>
                        </div>
                        <div class="input-field col s4">
                            <label>
								<input type="checkbox" name="discapacidad"
								@if($estudiante->discapacidad == "1") {{-- verifico si el estudiante tiene discapacidad, en caso q si, imprimo checked para checkar el checkbox --}} 
									checked value="1"
								@endif
								>
                                <span>Discapacidad</span>
                            </label>
                        </div>
                    </div>
                    <h4 class="center">Datos Acudiente 1</h4>
                    <div class="divider"></div>
                    <div class="row">
                            <div class="input-field col s4">
                                <input type="text" name="nombre_acu_1" value="{{$acudiente->nombre_acu_1}}" required>
                                <label>Nombres <label class="rojo">*</label></label>
                            </div>
                            <div class="input-field col s4">
                                <input type="text" name="direccion_acu_1" value="{{$acudiente->direccion_acu_1}}" required>
                                <label>Dirección <label class="rojo">*</label> </label>
                            </div>
                            <div class="input-field col s4">
                                <input type="number" name="telefono_acu_1" value="{{$acudiente->telefono_acu_1}}" required>
                                <label>Celular <label class="rojo">*</label> </label>
                            </div>
                            
                    </div>
                    <h4 class="center">Datos Acudiente 2</h4>
                    <div class="divider"></div>
                    <div class="row">
                            <div class="input-field col s4">
                                <input type="text" name="nombre_acu_2" value="{{$acudiente->nombre_acu_2}}">
                                <label>Nombres: </label>
                            </div>
                            <div class="input-field col s4">
                                <input type="text" name="direccion_acu_2" value="{{$acudiente->direccion_acu_2}}">
                                <label>Dirección: </label>
                            </div>
                            <div class="input-field col s4">
                                <input type="number" name="telefono_acu_2" value="{{$acudiente->telefono_acu_2}}" >
                                <label>Celular: </label>
                            </div>
                            
                    </div>
                    <div class="input-field center">
                        <button class="btn waves-effect cyan darken-3" type="submit" name="action">Enviar<i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection