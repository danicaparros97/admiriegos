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
    return view('auth.login');
});

Auth::routes();

Route::prefix('/indice')->group(function(){
    Route::get('/', function () {
        return view('principal.calendario');
    });

    Route::get('tareas', 'TareasController@index');
    Route::get('map', function(){
        return view('principal.mapa');
    });
    Route::get('calendario-tareas', function () {
        return view('principal.calendario');
    });

    Route::get('empleados', 'EmpleadosController@index');
});
