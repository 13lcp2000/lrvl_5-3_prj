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

Route::get('edad/{edad}', function ($edad) {
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

