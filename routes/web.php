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
//  Rutas Usuarios
Route::get('/usuarios', 'UserController@index')->name('usuarios');
Route::get('/usuarios/listado', 'UserController@obtener_datos');
// Rutas Competencias
Route::get('/competencias', 'CompetitionController@index')->name('competencias');
Route::get('/competencias/listado', 'CompetitionController@obtener_datos');