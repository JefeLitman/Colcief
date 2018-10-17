@if ($errors->any())
{{-- comment --}}
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
