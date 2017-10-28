<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//----------------------------------Rutas Usuarios---------------------------------------
Route::get('/usuarios', 'UserController@index')->name('usuarios');
Route::get('/usuarios/listado', 'UserController@obtener_datos');
Route::post('/usuarios/registrar','UserController@insert')->name('registro_usuario');
Route::post('/usuarios/editar','UserController@edit')->name('editar_usuario');
Route::any('/usuarios/eliminar','UserController@delete')->name('eliminar_usuario');
//----------------------------------Rutas Competencias-----------------------------------
Route::get('/competencias', 'CompetitionController@index')->name('competencias');
Route::get('/competencias/listado', 'CompetitionController@obtener_datos');
Route::post('/competencias/registrar','CompetitionController@insert')->name('registro_competencia');
Route::post('/competencias/editar','CompetitionController@edit')->name('editar_competencia');
Route::any('/competencias/eliminar','CompetitionController@delete')->name('eliminar_competencia');
//----------------------------------Rutas Universidades----------------------------------
Route::get('/universidades', 'UniversityController@index')->name('universidades');
Route::get('/universidades/listado', 'UniversityController@obtener_datos');
Route::post('/universidades/registrar','UniversityController@insert')->name('registro_universidad');
Route::post('/universidades/editar','UniversityController@edit')->name('editar_universidad');
Route::any('/universidades/eliminar','UniversityController@delete')->name('eliminar_universidad');
//----------------------------------Rutas Perfiles--------------------------------------
Route::get('/perfiles', 'ProfileController@index')->name('perfiles');
Route::get('/perfiles/listado', 'ProfileController@obtener_datos');
Route::post('/perfiles/registrar','ProfileController@insert')->name('registro_perfil');
Route::post('/perfiles/editar','ProfileController@edit')->name('editar_perfil');
Route::any('/perfiles/eliminar','ProfileController@delete')->name('eliminar_perfil');
//----------------------------------Rutas Categorias------------------------------------
Route::get('/categorias', 'CategoryController@index')->name('categorias');
Route::get('/categorias/listado', 'CategoryController@obtener_datos');
Route::post('/categorias/registrar','CategoryController@insert')->name('registro_categoria');
Route::post('/categorias/editar','CategoryController@edit')->name('editar_categoria');
Route::any('/categorias/eliminar','CategoryController@delete')->name('eliminar_categoria');
//----------------------------------Rutas Puntajes--------------------------------------
Route::get('/puntajes', 'ScoreController@index')->name('puntajes');
//Route::post('/puntajes', 'ScoreController@index')->name('puntajes_post');
Route::get('/puntajes/listado', 'ScoreController@obtener_datos');
Route::post('/puntajes/registrar','ScoreController@insert')->name('registro_puntaje');
Route::post('/puntajes/editar','ScoreController@edit')->name('editar_puntaje');
Route::any('/puntajes/eliminar','ScoreController@delete')->name('eliminar_puntaje');
//----------------------------------Rutas Eventos--------------------------------------
Route::get('/eventos', 'EventController@index')->name('eventos');
Route::get('/eventos/listado', 'EventController@obtener_datos');
Route::post('/eventos/registrar','EventController@insert')->name('registro_evento');
Route::post('/eventos/editar','EventController@edit')->name('editar_evento');
Route::any('/eventos/eliminar','EventController@delete')->name('eliminar_evento');
