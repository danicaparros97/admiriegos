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

Route::prefix('/administracion')->middleware('admin')->group(function(){
    Route::get('/', 'TareasController@index');//Se muestran todas las tareas
	Route::get('pdf/{id}', 'PdfController@invoice');

    //Grupo de rutas para los empleados
    Route::prefix('empleados')->group(function(){
        Route::get('/', 'EmpleadosController@index');//Se muestran todos los empleados
        Route::get('empleado/create', 'EmpleadosController@create');//Se muestra el formulario para crear un empleado
        Route::post('empleado/store',  'EmpleadosController@store');//Coge los datos del formulario y los inserta en la bbdd
        Route::get('empleado/destroy/{id_empleado}',  'EmpleadosController@destroy');//Elimina al empleado de la bbdd
        Route::get('empleado/edit/{id_empleado}', 'EmpleadosController@edit');//Muestra el formulario con los datos del empleado pasados como parametro para editarlo
        Route::post('empleado/update/{id_empleado}', 'EmpleadosController@update');//Coge los datos del formulario y los inserta en la bbdd
        Route::get('empleado/show/{id_empleado}', 'EmpleadosController@show');

    });

    //Grupo de rutas para las fincas
    Route::prefix('fincas')->group(function(){
        Route::get('/', 'FincasController@index');//Se muestran todas las fincas y los sectores que tiene cada una
        Route::get('finca/create', 'FincasController@create');//Se muestra el formulario para crear una finca
        Route::post('finca/store', 'FincasController@store');//Coge los datos del formulario y los inserta en la bbdd
        Route::get('finca/destroy/{id_finca}',  'FincasController@destroy');//Elimina la finca de la bbdd
        Route::get('finca/edit/{id_finca}',  'FincasController@edit');//Muestra el formulario con los datos de la finca pasados como parametro para editarla
        Route::post('finca/update/{id_finca}',  'FincasController@update');//Coge los datos del formulario y los inserta en la bbdd

    });

    
    //Grupo de rutas para los sectores
    Route::prefix('sectores')->group(function(){
        Route::get('sector/create', 'SectoresController@create');//Se muestra el formulario para crear un sector
        Route::post('sector/store', 'SectoresController@store');//Coge los datos del formulario y los inserta en la bbdd
        Route::get('sector/destroy/{id_sector}', 'SectoresController@destroy');//Elimina el sector de la bbdd
    });
    
    //Grupo de rutas para las tareas
    Route::prefix('tareas')->group(function(){
        
        Route::get('tarea/create', 'TareasController@create');//Se muestra el formulario para crear una tarea
        Route::post('tarea/store', 'TareasController@store');//Coge los datos del formulario y los inserta en la bbdd
        Route::get('tarea/finalizar/{id_tarea}',  'TareasController@finalizarTarea');//Elimina al empleado de la bbdd
    });
    //Grupo de rutas para 
    Route::prefix('incidencias')->group(function(){
        Route::get('/', 'IncidenciasController@index');//Se muestran todas las incidencias
        Route::get('incidencia/edit', 'IncidenciasController@edit');//Se muestra el formulario para editar una incidencia
        Route::post('incidencia/update', 'IncidenciasController@update');//Coge los datos del formulario para actualizar la incidencia
    });


});

Route::prefix('/empleado')->group(function(){
    Route::get('/', 'EmpleadosController@indexEmpleado');
    Route::get('show/{id_empleado}', 'EmpleadosController@show');
    Route::get('incidencia', 'IncidenciasController@create');
    Route::post('incidencia/store', 'IncidenciasController@store');


});
