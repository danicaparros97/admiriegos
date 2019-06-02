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

Route::prefix('/enc')->middleware('encargado')->group(function(){
    Route::get('/', function () {
        return view('principal.calendario');
    });
    
    Route::get('map', function(){
        return view('principal.mapa');
    });

    //Grupo de rutas para los empleados
    Route::prefix('empleados')->group(function(){
        Route::get('/', 'EmpleadosController@index');//Se muestran todos los empleados
        Route::get('empleado/create', 'EmpleadosController@create');//Se muestra el formulario para crear un empleado
        Route::post('empleado/add',  'EmpleadosController@store');//Coge los datos del formulario y los inserta en la bbdd
    });

    //Grupo de rutas para las fincas
    Route::prefix('fincas')->group(function(){
        Route::get('/', 'FincasController@index');//Se muestran todas las fincas y los sectores que tiene cada una
        Route::get('finca/create', 'FincasController@create');//Se muestra el formulario para crear una finca
        Route::post('finca/store', 'FincasController@store');//Coge los datos del formulario y los inserta en la bbdd
    });

    
    //Grupo de rutas para los sectores
    Route::prefix('sectores')->group(function(){
        Route::get('/', 'SectoresController@index');//Se muestran todos los sectores y la finca a la que pertenecen
        Route::get('sector/create', 'SectoresController@create');//Se muestra el formulario para crear un sector
        Route::post('sector/store', 'SectoresController@store');//Coge los datos del formulario y los inserta en la bbdd
    });
    
    //Grupo de rutas para las tareas
    Route::prefix('tareas')->group(function(){
        Route::get('/', 'TareasController@index');//Se muestran todas las tareas
        Route::get('tarea/create', 'TareasController@create');//Se muestra el formulario para crear una tarea
        Route::post('tarea/store', 'TareasController@store');//Coge los datos del formulario y los inserta en la bbdd
    });
    //Grupo de rutas para 
    Route::prefix('incidencias')->group(function(){
        Route::get('/', 'IncidenciasController@index');//Se muestran todas las incidencias
        Route::get('incidencia/edit', 'IncidenciasController@edit');//Se muestra el formulario para editar una incidencia
        Route::post('incidencia/update', 'IncidenciasController@update');//Coge los datos del formulario para actualizar la incidencia
    });


});
