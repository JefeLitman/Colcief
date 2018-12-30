@extends('contenedores.admin')
@section('titulo',' Horarios')
@section('contenedor_admin')


<h1>Lista horarios</h1>

<div class="container-fluid">
  <div class="row" style="background-color: #fafafa !important;">
    @foreach ($horarios as $key => $item)
      <div class="col-md-2">
        {{$key}}
        <hr>
        <ul class="list-group">
        @foreach ($item as $horario)
          @php
          $hora_i = explode(':',$horario->hora_inicio);
          $hora_f = explode(':',$horario->hora_fin);
          @endphp

          <li class="list-group-item list-group-item-info"><span>{{$horario->nombre}}</span> {{$hora_i[0]}}:{{$hora_i[1]}} - {{$hora_f[0]}}:{{$hora_f[1]}}</li>
        @endforeach
        </ul>
      </div>
    @endforeach
  </div>
</div>
@endsection
