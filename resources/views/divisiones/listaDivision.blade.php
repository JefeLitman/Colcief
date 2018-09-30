@extends('contenedores.admin')
@section('contenedor_principal')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="" id="autocompletar">
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        @csrf
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <div id="aux"></div>
                        <label for="autocomplete-input">Autocomplete</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <div id="result"></div>
    @foreach ($division as $i)
        <p>Nombre: {{ $i->nombre }}</p>
        <p>Porcentaje: {{ $i->porcentaje }}</p>
        <p>Descripcion: {{ $i->descripcion }}</p>
        <br>
    @endforeach
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/autocomplete.js') }}"></script>
<script>autocompletar('division')</script>
@endsection


