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
Route::post('/usuarios/registrar','UserController@insert')->name('registro_usuario');
Route::post('/usuarios/editar','UserController@edit')->name('editar_usuario');
Route::any('/usuarios/eliminar','UserController@delete')->name('eliminar_usuario');
// Rutas Competencias
Route::get('/competencias', 'CompetitionController@index')->name('competencias');
Route::get('/competencias/listado', 'CompetitionController@obtener_datos');
Route::post('/competencias/registrar','CompetitionController@insert')->name('registro_competencia');
Route::post('/competencias/editar','CompetitionController@edit')->name('editar_competencia');
Route::any('/competencias/eliminar','CompetitionController@delete')->name('eliminar_competencia');