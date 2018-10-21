@if ($errors->any())
{{-- comment --}}
<div id="myModal" class="modal">
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Falta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- /////////////////////////////////////////// --}}
{{-- <div id="modal1" class="modal">
    <div class="row">
        <div class="col s1"></div>
        <div class="col s10">
            <br>
            <div class="card cyan lighten-5">
                <div class="modal-content center">
                    <h4>Falta</h4>

                </div>
            </div>
            <div class="modal-close center">
                <a href="#!" class="btn waves-effect cyan darken-3">Cerrar</a>
            </div>
        </div>
    </div>
</div> --}}
@endif
