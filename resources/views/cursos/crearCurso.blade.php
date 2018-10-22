

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col s12 center">
             <br>
             <h2>Crear Curso</h2>
            <div class="card green lighten-5">
                <div class="card-content">
                    <form enctype="multipart/form-data" action="/cursos" method = "POST">
                        @csrf
                        {{-- input field es necesario para la animación de los label --}}
                        <div class="input-field">
                            <input type="text" name="nombre" id="nombre">
                            <label for="nombre">Nombre Curso:</label>
                        </div>
                        <button type="submit">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
