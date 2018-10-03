@if ($errors->any())
{{-- comment --}}
<div id="modal1" class="modal">
    <div class="modal-content center">
        <h2>Falta</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div class="modal-close center">
        <a href="#!" class="btn waves-effect cyan darken-3">Cerrar</a>
    </div>
    <br>
</div>
@endif
