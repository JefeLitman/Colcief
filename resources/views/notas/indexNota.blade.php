@extends('contenedores.'.((session('role')=='administrador')?'admin':'profesor'))
@section('contenedor_'.((session('role')=='administrador')?'admin':'profesor'))
@section('titulo','Notas')
<br id="br">
<div class="container" style="background:#fafafa !important;">
    <div class="card bg-light border-info">
        <h4 class="card-header text-center">
            <i class="fas fa-book"></i> Notas
        </h4>
        @if (!empty($divisiones))
          <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                  @php
                      $i=0;
                  @endphp
                  @foreach ($divisiones as $nombre => $division)
                      <li class="nav-item">
                          <a class="nav-link @if($i==0) active @endif" id="tab{{$i}}" data-toggle="tab" href="#id{{$i}}" role="tab" aria-controls="id{{$i}}" aria-selected="true">{{$nombre}}</a>
                      </li>
                  @php
                      $i++;
                  @endphp
                  @endforeach
              </ul>
              <div class="tab-content" id="myTabContent">
                  @php
                      $j=0;
                  @endphp
                  @foreach ($divisiones as $nombre => $division)
                  <div class="tab-pane fade @if($j==0) show active @endif" id="id{{$j}}" role="tabpanel" aria-labelledby="tab{{$j}}">
                      <div class="table-responsive">
                          <table class="table table-striped table-condensed table-sm table-hover text-center">
                              <thead>
                                  <tr>
                                      {{-- Nombre de la nota --}}
                                      <th scope="col" style="color:#00695c" class="text-center">Nombre de la nota</th>
                                      {{-- Porcentaje --}}
                                      <th scope="col" style="color:#00695c" class="text-center"><i class="fas fa-percentage"></i></th>
                                      {{-- Descripción --}}
                                      <th scope="col" style="color:#00695c" class="text-center">Descripción</th>
                                      {{-- Acciones --}}
                                      <th scope="col" style="color:#00695c" class="text-center" colspan="3">Acciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($division as $nota)
                                      <tr>
                                          {{-- Nombre de la nota --}}
                                          <td class="text-center">{{$nota['nombre']}}</td>
                                          {{-- Porcentaje --}}
                                          <td class="text-center">{{$nota['porcentaje']}}</td>
                                          {{-- Descripción --}}
                                          <td class="text-center">{{$nota['descripcion']}}</td>
                                          {{-- Editar --}}
                                          <td class="text-center"><a href="{{ route('notas.edit',$nota['pk_nota']) }}"><i class="fas fa-edit" style="color:#00695c"></i>
                                          </a></td>
                                          {{-- Ver --}}
                                          {{-- <td class="text-center">
                                              <a href="{{ route('notas.show',$nota['pk_nota']) }}" title="Ver notas" style="color:#00695c">
                                                  <i class="fas fa-eye"></i>
                                              </a>
                                          </td> --}}
                                          {{-- Eliminar --}}
                                          <td class="text-center">
                                              <form action="{{route('notas.destroy',$nota['pk_nota'])}}" method = "post">
                                                  @csrf
                                                  @method("DELETE")
                                                  {{-- <i class="fas fa-trash-alt" style="color:#c62828" type="submit"></i> --}}
                                                  <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt" style="color:#c62828"></i></button>
                                              </form>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
                  @php
                      $j++;
                  @endphp
              @endforeach
              </div>
          </div>
          @else
          <br>
            <h5 class="card-title text-center">
                No hay notas disponibles
            </h5>
            <br>
        @endif
    </div>
    <br>
    <div class="text-center" style="float:center;">
        <a  class="btn btn-success" style="background-color: #17a2b8 !important; border-color: #17a2b8 !important;" href="/notas/crear/{{$infoMateria->pk_materia_pc}}">Crear nota</a>
    </div>
</div>
@endsection
