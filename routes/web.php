<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'Auth\LoginController@login')->name('login');

Route::post('autentication', 'Auth\LoginController@autentication')->name('autentication');

Route::get('init', 'InitController@index')->name('init');

Route::post('logout', 'InitController@logout')->name('logout');