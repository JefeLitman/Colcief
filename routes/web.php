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
    return view('pantallas.welcome');
})->name('home');
Route::get('/contacto', function () {
    return view('pantallas.contacto');
});
Route::get('/nosotros', function () {
    return view('pantallas.nosotros');
});
Route::get('/terminal/link', 'Terminal@link');
Route::get('/terminal/migrate/seed', 'Terminal@migrateAndSeeders');
Route::get('/terminal/migrate', 'Terminal@migrate');
Route::get('/terminal/migrate/reset', 'Terminal@migrateReset');
Route::get('/terminal/migrate/refresh', 'Terminal@migrateRefresh');
Route::get('/terminal/seed', 'Terminal@seed');
Route::get('/terminal/main', 'Terminal@migrateResetSeeder');
Route::get('/terminal/autoload', 'Terminal@autoload');
Route::get('/terminal/cache', 'Terminal@autoload');

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
Route::get('estudiantes/cursos/{pk_curso}', 'EstudianteController@estudianteGrado' )->middleware('admin:administrador');
Route::post('estudiantes/restaurar/{pk_estudiante}', 'EstudianteController@restaurar');
Route::resource('/estudiantes', 'EstudianteController');

/* RUTAS EMPLEADO */
Route::get('empleados/principal/0', function () {
    return view('empleados.adminPrincipal');
})->middleware('admin:administrador');

Route::get('empleados/principal/1', function () {
    return view('empleados.directorPrincipal');
})->middleware('admin:director');

Route::get('empleados/principal/2', function () {
    return view('empleados.profesorPrincipal');
})->middleware('admin:profesor');

Route::put('/empleados/{id}/time/{time}', 'EmpleadoController@tiempoExtra');

// Route::get('empleados/principal/{rol}', function ($rol) {
//     switch($rol){
//         case '0':
//             return view('empleados.adminPrincipal');
//             break;
//         case '1':
//             return view('empleados.directorPrincipal');
//             break;
//         case '2':
//             return view('empleados.profesorPrincipal');
//             break;
//     }
// })->middleware('admin:profesor,director,administrador');

Route::post('/empleados/perfil', 'EmpleadoController@perfil');
Route::post('empleados/restaurar/{cedula}', 'EmpleadoController@restaurar');
Route::resource('/empleados','EmpleadoController');


/*RUTAS DE PERIODO*/
Route::get('/periodos','PeriodoController@index')->name('periodos.index');
Route::get('/periodos/{pk_periodo}/editar','PeriodoController@edit')->name('periodos.edit');
Route::put('/periodos/{pk_periodo}','PeriodoController@update')->name('periodos.update');

/*RUTAS DE MATERIA*/
Route::resource('/materias','MateriaController');

/* RUTAS DE DIVISIÓN */
Route::get('/divisiones','DivisionController@index')->name('divisiones.index');
Route::get('/divisiones/editar','DivisionController@edit')->name('divisiones.edit');
Route::put('/divisiones','DivisionController@update')->name('divisiones.update');
Route::get('/divisiones/crear','DivisionController@create')->name('divisiones.create');
Route::post('/divisiones','DivisionController@store')->name('divisiones.store');

/* RUTAS DE CURSO */
Route::get('/cursos/estudiantes/{prefijo}/{sufijo}','CursoController@conteoEstudiantes');
Route::get('/cursos/grados/{grado}','CursoController@conteoCursosPorGrado');
Route::resource('/cursos','CursoController');
Route::get('/pruebajax','CursoController@prueba'); //Eliminar método y ruta
Route::post('/cursos/sigSufijo', 'CursoController@sigSufijo')->name('cursos.sigSufijo');
Route::get('/cursos/{pk_curso}/planillas','CursoController@cursoPlanillas');


/* RUTAS DE MATERIAPC */
// Debe estar logeado para acceder
Route::resource('/materiaspc','MateriaPCController');
Route::get('/planillas/{pk_materia_pc}/periodos/{pk_periodo}','MateriaPCController@showPlanillas');
Route::get('/planillas/{pk_materia_pc}/periodos/{pk_periodo}/editar','MateriaPCController@editarPlanillas');
Route::put('/planillas/{pk_materia_pc}/periodos/{pk_periodo}','MateriaPCController@updatePlanillas')->middleware('admin:profesor');


/* RUTAS DE NOTA */
Route::get('/notas/crear/{pk_materia_pc}','NotaController@create');
//Route::get('/notas/total/{cedula_prof}/{division}/{pk_materia_pc}','NotaController@sumaPorcentajes');
Route::get('/notas/materiaspc/{pk_materia_pc}/periodos/{pk_periodo}','NotaController@index')->name('notas.index');
Route::post('/notas','NotaController@store')->name('notas.store');
//Route::get('/notas','NotaController@index_global')->name('notas.indexGlobal');
Route::get('/notas',function (){
  return redirect('/materiaspc');
});
Route::get('/notas/crear','NotaController@create')->name('notas.create');
Route::get('/notas/{nota}','NotaController@show')->name('notas.show');
Route::delete('/notas/{nota}','NotaController@destroy')->name('notas.destroy');
Route::patch('/notas/{nota}','NotaController@update')->name('notas.update');
Route::get('/notas/{nota}/editar','NotaController@edit')->name('notas.edit');

/* RUTAS DE HORARIO */
Route::get('/horarios/curso','HorarioController@verHorarioDirectorCurso');
Route::get('/horarios/director','HorarioController@verHorarioDirector');
Route::get('/horarios/{pk_materia}','HorarioController@materias');
Route::resource('/horarios','HorarioController');
Route::get('/horarios/{pk_materiaPC}/crear','HorarioController@create')->name('crearHorario');
Route::get('/horarios/{pk_materiaPC}/editar','HorarioController@edit');

/* RUTAS DE BOLETIN */
Route::resource('/boletines','BoletinController')->middleware('admin:administrador');
Route::get('/boletines/actual/estudiantes/{fk_estudiante}','BoletinController@showEstudiante')->middleware('admin:administrador');
Route::get('/boletines/{ano}/estudiantes/{fk_estudiante}','BoletinController@showAnoEstudiante')->middleware('admin:administrador');

/* RUTAS DE NOTIFICACION */
Route::post('/notificaciones','NotificacionController');
Route::delete('/notificaciones/{pk_notificacion}','NotificacionController@destroy');
Route::get('/notificaciones', 'NotificacionController@index');

/* RUTAS DE FECHA */
Route::get('/fechas/editar', 'FechaController@edit')->name('fechas.edit');
Route::put('/fechas', 'FechaController@update')->name('fechas.update');
Route::get('/fechas', 'FechaController@index')->name('fechas.index');

/* RUTAS ARCHIVO */
Route::resource('/archivos', 'ArchivoController');


/* RUTAS DE NOTAS PERIODO */
Route::resource('/notasperiodo','NotaPeriodoController')->middleware('admin:profesor');

/* RUTAS DE NOTAS ESTUDIANTE */
Route::resource('/notasestudiante','NotaEstudianteController')->middleware('admin:profesor');

/* RUTAS DE NOTAS DIVISION */
Route::resource('/notasdivision','NotaDivisionController')->middleware('admin:profesor');

/* RUTAS DE MATERIA BOLETIN */
Route::resource('/materiasboletin','MateriaBoletinController')->middleware('admin:profesor');

/* RUTAS DE NIVELACIONES */
Route::resource('/nivelaciones','NivelacionController');
Route::resource('/recuperaciones','RecuperacionController');

/* RUTAS SIGSE */
Route::get('/SIGSE','SIGSEController@index')->name('SIGSE.index');
Route::post('/SIGSE','SIGSEController@show')->name('SIGSE.show');

//Route::redirect('/{texto}', '/', 301)->where('texto', '[\w\W\d\D]+'); //Ruta default cuando no se escoje ninguna
//ruta preseleccionada by: Edgar Rangel

Route::get('/password', 'ResetPassword@form') -> name('password.dates');
Route::post('/password', 'ResetPassword@recuperacion') -> name('password.authentication');

Route::post('/password/email', 'ResetPassword@SendResetLinkEmail') -> name('password.email');
Route::get('/password/reset', 'ResetPassword@showLinkRequestForm') -> name('password.request');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm') -> name('password.reset');
Route::post('/contacto', 'Login\LoginController@contacto');

Route::post('/filtro', 'EstudianteController@filtro');
Route::get('/filtro', 'EstudianteController@estudiantes');
