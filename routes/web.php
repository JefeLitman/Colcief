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
    return view('pantallas.bienvenida');
});

Route::get('/contacto', function () {
    return view('pantallas.contacto');
});

Route::get('/nosotros', function () {
    return view('pantallas.nosotros');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/estudiantes/ver', 'EstudianteController@view'); //Puedo eliminar esto?. no se si alguien lo necesita
Route::resource('/estudiantes', 'EstudianteController');
Route::resource('/acudientes','AcudienteController');
Route::resource('/empleados','EmpleadoController');
Route::resource('/periodo','PeriodoController');
Route::resource('/materias','MateriaController');
Route::resource('/divisiones','DivisionController');
Route::get('/login', 'Login\LoginController')->name('login');
Route::post('/login', 'Login\LoginController@authenticate')->name('authenticate');
Route::get('/logout', 'Login\LoginController@logout')->name('logout');
//Ruta de autocompletado
Route::post('/autocompletar/{text}', 'AjaxController')->name('autocompletar');

//Route::redirect('/{texto}', '/', 301)->where('texto', '[\w\W\d\D]+'); //Ruta default cuando no se escoje ninguna
//ruta preseleccionada by: Edgar Rangel
