<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pantallas.inicio');
})->name('home');

Route::get('/contacto', function () {
    return view('pantallas.contacto');
});

Route::get('/nosotros', function () {
    return view('pantallas.nosotros');
});

Route::get('estudiantes/principal', function () {
    return view('estudiantes.principal');
})->middleware('admin:estudiante');

Route::get('estudiantes/periodo/{p}', function ($p) {
    return view('estudiantes.periodo',['periodo' => $p]);
})->middleware('admin:estudiante');


Route::get('empleados/principal', function () {
    return view('empleados.principal');
})->middleware('admin:profesor,director,administrador');

Route::get('estudiantes/cursos', function () {
    return view('cursos.cursos');
});


Route::get('terminal', 'Terminal@link');

//para ver las notas del periodo
// Route::get('/estudiantes/periodo/{periodo}', 'EstudianteController@periodo')->middleware('admin:estudiante');

//Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/estudiantes/ver', 'EstudianteController@view'); //Puedo eliminar esto?. no se si alguien lo necesita
Route::post('/estudiantes/perfil/{pk_estudiante}', 'EstudianteController@perfil');
Route::post('/empleados/perfil/{cedula}', 'EmpleadoController@perfil');

Route::resource('/estudiantes', 'EstudianteController');
Route::resource('/acudientes','AcudienteController');
Route::resource('/empleados','EmpleadoController');
Route::resource('/periodos','PeriodoController');
Route::resource('/materias','MateriaController');
Route::resource('/divisiones','DivisionController');
Route::resource('/cursos','CursoController');
Route::resource('/materiaspc','MateriaPCController');
Route::resource('/notas','NotaController');
Route::get('/notas/crear/{materia}','NotaController@create');
Route::get('/login', 'Login\LoginController')->name('login');
Route::post('/login', 'Login\LoginController@authenticate')->name('authenticate');
Route::get('/logout', 'Login\LoginController@logout')->name('logout');
//Ruta de autocompletado
Route::post('/autocompletar/{text}', 'AjaxController')->name('autocompletar');

//Route::redirect('/{texto}', '/', 301)->where('texto', '[\w\W\d\D]+'); //Ruta default cuando no se escoje ninguna
//ruta preseleccionada by: Edgar Rangel
