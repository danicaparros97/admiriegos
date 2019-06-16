<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sector;
use App\Finca;
use App\Incidencia;
class SectoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectores = Sector::all();
        return view('administrador.sectores')->with('sectores', $sectores);
    }

    /**
     * Muestra una vista con el formulario de insercion de sectores en la base de datos
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Busca todas las fincas
        $fincas = Finca::all();
        //Busca las incidencias que esten sin resolver
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['fincas' => $fincas, 'incidencias' => $incidencias];
        //Devuelve una vista con los datos pasados mediante el metodo with
        return view('formularios.crearSector')->with('datos', $datos);
    }

    /**
     * Inserta en la base de datos los valores recogidos del formulario llamado con el metodo create
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Inserta en la base de datos un sector con los datos recogidos del formulario
        $sector = Sector::create($request->all());
        //Redirige a la ruta que mostrara todas las fincas
        return redirect('/administracion/fincas');
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
     * Elimina el sector pasado como parametro
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Busca el sector mediante el id pasado como parametro
        $sector = Sector::find($id);
        //Elimina el sector
        $sector->delete();
        //Redirige a la ruta que muestra todas las fincas
        return redirect('/administracion/fincas');
    }
}
