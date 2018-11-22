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

/*
=============INFORMACIÓN IMPORTANTE======================
Las rutas de tipo recurso de más bajo URL (ex: "/ruta" es de más bajo nivel que "/ruta/rutita")
deben ir abajo de todas las otras rutas que accedan a la misma tabla para que no ocurra
solapamiento.
*/

/* RUTAS MISCELANEA
  Aquí van todas las rutas que no estén ligadas exáctamente a una tabla o query
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
Route::get('terminal', 'Terminal@link');
Route::post('/autocompletar/{text}', 'AjaxController')->name('autocompletar');

/* RUTAS DEL LOGIN*/
Route::get('/login', 'Login\LoginController')->name('login');
Route::post('/login', 'Login\LoginController@authenticate')->name('authenticate');
Route::get('/logout', 'Login\LoginController@logout')->name('logout');

/* RUTAS ESTUDIANTE */
Route::post('/estudiantes/perfil/{pk_estudiante}', 'EstudianteController@perfil');
Route::get('estudiantes/principal', function () {
    return view('estudiantes.principal');
})->middleware('admin:estudiante');
Route::get('estudiantes/periodo/{p}', function ($p) {
    return view('estudiantes.periodo',['periodo' => $p]);
})->middleware('admin:estudiante');
Route::resource('/estudiantes', 'EstudianteController');
Route::get('estudiantes/cursos/{p}/{s}', 'EstudianteController@estudianteGrado' )->middleware('admin:administrador');


/* RUTAS EMPLEADO */
Route::get('empleados/principal', function () {
    return view('empleados.principal');
})->middleware('admin:profesor,director,administrador');
Route::get('empleados/editarEstudiantes', function () {
    return view('cursos.editarEstudiante');
});
Route::get('empleados/eliminarEstudiantes', function () {
    return view('cursos.eliminarEstudiante',['pas'=>'1']);
});
Route::post('/empleados/perfil/{cedula}', 'EmpleadoController@perfil');
Route::resource('/empleados','EmpleadoController');

/* RUTAS DE ACUDIENTE */
Route::resource('/acudientes','AcudienteController');

/*RUTAS DE PERIODO*/
Route::resource('/periodos','PeriodoController');

/*RUTAS DE MATERIA*/
Route::resource('/materias','MateriaController');

/* RUTAS DE DIVISIÓN */
Route::resource('/divisiones','DivisionController');

/* RUTAS DE CURSO */
Route::get('/cursos/estudiantes/{prefijo}/{sufijo}','CursoController@conteoEstudiantes');
Route::get('/cursos/grados/{grado}','CursoController@conteoCursosPorGrado');
Route::resource('/cursos','CursoController');
Route::get('/pruebajax','CursoController@prueba'); //Eliminar método y ruta

/* RUTAS DE MATERIAPC */
// Debe estar logeado para acceder
Route::resource('/materiaspc','MateriaPCController');

/* RUTAS DE NOTA */
Route::get('/notas/crear/{materia}','NotaController@create');
Route::get('/notas/total/{cedula_prof}/{division}/{pk_materia_pc}','NotaController@sumaPorcentajes');
Route::resource('/notas','NotaController');

/* RUTAS DE HORARIO */
Route::get('/horarios/{pk_materia}','HorarioController@materias');
Route::resource('/horarios','HorarioController');
Route::get('/horarios/{pk_materiaPC}/crear','HorarioController@create');
Route::get('/horarios/{pk_materiaPC}/editar','HorarioController@edit');

/* RUTAS DE BOLETIN */
Route::resource('/boletines','BoletinController');
Route::get('/boletines/actual/estudiantes/{fk_estudiante}','BoletinController@showEstudiante');
Route::get('/boletines/actual/cursos/{fk_curso}','BoletinController@showCurso');

//Route::redirect('/{texto}', '/', 301)->where('texto', '[\w\W\d\D]+'); //Ruta default cuando no se escoje ninguna
//ruta preseleccionada by: Edgar Rangel
