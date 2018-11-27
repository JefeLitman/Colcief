@extends('contenedores.admin')
@section('contenedor_admin')
@section('titulo','Lista Cursos')
<br id="br">
<div class="container">
    <div class="accordion" id="accordionExample">
        @php
            $i=0;
        @endphp
        @foreach ($cursos as $prefijo => $curso)
            <div class="card mx-auto border-dark bg-light" style="border-color:#66bb6a !important;">
                <div id="headingOne">
                    <div class="card-header" style="background-color:#66ba6a7d !important; cursor: pointer;" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}" >
                        <h5 class="text-center mb-0">
                            {{ $prefijo }}
                        </h5>
                    </div>
                </div>
                <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mr-auto">
                                <thead>
                                    <tr>
                                        <th scope="col" style="color:#00695c" class="text-center">Curso</th>
                                        <th scope="col" style="color:#00695c" class="text-center"> Año</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($curso as $c)
                                        <tr>
                                            {{-- Curso  --}}
                                            <td class="text-center">{{$c->prefijo}}-{{$c->sufijo}}</td>
                                            {{--  Año  --}}
                                            <td class="text-center">{{$c->ano}}</td>
                                            {{-- editar materia --}}
                                            <td class="text-center"><a href="{{ route('cursos.edit',$c->pk_curso) }}"><i class="fas fa-edit" style="color:#00838f"></i>
                                            </a></td>
                                            {{-- eliminar materia --}}
                                            <td class="text-center">
                                                <form action="{{route('cursos.destroy', $c->pk_curso)}}" method = "post">
                                                    @csrf
                                                    @method("DELETE")
                                                    {{-- <i class="fas fa-trash-alt" style="color:#c62828" type="submit"></i> --}}
                                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt" style="color:#c62828"></i></button>
                                                </form>
                                            </td>
                                            {{-- ver --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{--  @endfor  --}}
            @php
                $i++;
            @endphp
        @endforeach
    </div>
</div>
<script src="{{ asset('js/ajax.js') }}"></script>
@endsection
