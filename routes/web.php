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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/estudiantes', 'EstudianteController');
Route::resource('/acudientes','AcudienteController');
Route::resource('/empleados','EmpleadoController');
Route::resource('/periodo','PeriodoController');
Route::resource('/materias','MateriaController');
Route::resource('/cursos','CursoController');

//Route::fallback(function () { return "error"; }); //Ruta Default
