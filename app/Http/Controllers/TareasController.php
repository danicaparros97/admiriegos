<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tarea;
use App\User;
use App\Incidencia;

class TareasController extends Controller
{
    /**
     * Muestra todas las tareas 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Busca las tareas y las pagina
        $tareas = Tarea::paginate(10);
        //Busca las incidencias con estado sin resolver
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['tareas' => $tareas, 'incidencias' => $incidencias];
        //Devuelve una vista con los datos pasados mediante el metodo with
        return view('administrador.tareas')->with('datos', $datos);
    }

    /**
     * Muestra el formulario para insertar una tarea en la base de datos
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Busca las incidencias con estado sin resolver
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['incidencias' => $incidencias];
        //Devuelve la vista pasandole los datos mediante el metodo with
        return view('formularios.crearTarea')->with('datos', $datos);
    }

    /**
     * Inserta en la tabla tareas una tarea con los valores recogidos del metodo create
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea = Tarea::create($request->all());

        //Redirige a la ruta principal del modulo de administracion
        return redirect('/administracion');
    }

    /**
     * Metodo que se encarga de cambiar el estado de la tarea pasada como parametro
     * 
     * @param int $id
     */
    public function finalizarTarea($id){

        //Busca una tarea mediante el id
        $tarea = Tarea::find($id);
        //Comprueba el estado de la tarea, si es activa, lo cambia a finalizada
        if ($tarea->estado == 'activa') {
            $tarea->estado = 'finalizada';
        }
        $tarea->save();
        //Redirige a la ruta principal del modulo de administracion
        return redirect('/administracion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
