@extends('contenedores.profesor')
@section('titulo',' Ver Notas')
@section('contenedor_profesor')
{{-- mensajes de error --}}
@include('error.error')
<br id="br">
<div class="container">
        <div class="accordion" id="accordionExample">
        @php
            $i=0;
        @endphp
        @foreach ($datos as $dato)
            <div class="card mx-auto border-dark bg-light" style="border-color:#66bb6a !important;">
                <div id="headingOne">
                    <div class="card-header" style="background-color:#66ba6a7d !important; cursor: pointer;" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}" >
                        <h5 class="text-center mb-0">
                            {{$dato[2]['nombre']}}
                        </h5>
                    </div>
                </div>
                <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mr-auto">
                                <thead>
                                    <tr>
                                        <th scope="col" style="color:#00695c" class="text-center">Nota </th>
                                        <th scope="col" style="color:#00695c" class="text-center">División </th>
                                        <th scope="col" style="color:#00695c" class="text-center"><i class="fas fa-percentage"> </th>
                                        <th scope="col" style="color:#00695c" class="text-center">Salón </th>
                                        <th scope="col" style="color:#00695c" class="text-center">Descripción</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--  @foreach($materia as $j)  --}}
                                        <tr>
                                            {{--  NOTA  --}}
                                            <td class="text-center">{{$dato[0]['nombre']}}</td>
                                            {{--  DIVISIÓN  --}}
                                            <td class="text-center">{{$dato[1]['nombre']}}</td>
                                            {{--  PORCENTAJE  --}}
                                            <td class="text-center">{{$dato[0]['porcentaje']}}</td>
                                            {{--  SALÓN  --}}
                                            <td class="text-center"></td>
                                            {{--  DESCRIPCIÓN  --}}
                                            <td class="text-center">{{$dato[0]['descripcion']}}</td>
                                            {{-- editar materia --}}
                                            <td class="text-center"><a href="{{ route('notas.edit',$dato[0]['pk_nota']) }}"><i class="fas fa-edit" style="color:#00838f"></i>
                                            </a></td>
                                            {{-- eliminar materia --}}
                                            <td class="text-center">
                                                <form action="{{route('notas.destroy', $dato[0]['pk_nota'])}}" method = "post">
                                                    @csrf
                                                    @method("DELETE")
                                                    {{-- <i class="fas fa-trash-alt" style="color:#c62828" type="submit"></i> --}}
                                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt" style="color:#c62828"></i></button>
                                                </form>
                                            </td>
                                            {{-- ver --}}
                                        </tr>

                                    {{--  @endforeach  --}}
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

