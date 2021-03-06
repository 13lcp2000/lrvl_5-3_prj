<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// ====== Examples of using correctly some routes ======

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('prueba', function () {
    return "Hola desde el Routes.php";
});

Route::get('nombre/{nombre}', function ($nombre) {
    return 'Mi nombre es: '.$nombre;
});

Route::get('eda@created/{edad}', function ($edad) {
    return 'Mi edad es: '.$edad;
});

Route::get('edad2/{edad?}', function ($edad = 20) {
    return 'Mi EDAD es: '.$edad;
});   

Route::get('pruebactrl', 'PruebaController@index');
Route::get('pruebaname/{nombre}', 'PruebaController@nombre');

Route::resource('pelicula', 'PeliculaController');

// ====== Examples of using correctly some routes ======



// =========== Routes of the Cinema Web Application ===========

Route::get('/', 'FrontController@index');
Route::get('contacto', 'FrontController@contacto');
Route::get('resenias', 'FrontController@resenias');
Route::get('admin', 'FrontController@admin');

Route::get('password/email','Auth\ForgotPasswordController@getEmail');
Route::post('password/email','Auth\ForgotPasswordController@postEmail');

Route::get('password/reset/{token}','Auth\ResetPasswordController@getReset');
Route::post('password/reset','Auth\ResetPasswordController@postReset');

Route::resource('usuario', 'UsuarioController');
Route::resource('genero', 'GeneroController');
Route::get('generos', 'GeneroController@listing');
Route::resource('log','LogController');
Route::resource('correo','CorreoController');
Route::get('logout','LogController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index');
