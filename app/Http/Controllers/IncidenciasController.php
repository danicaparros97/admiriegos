<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Incidencia;

class IncidenciasController extends Controller
{
    /**
     * Muestra las incidencias que tengan como estado sin resolver
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['incidencias' => $incidencias];
        //Devuelve la vista con los datos pasados mediante el metodo with
        return view('administrador.incidencias')->with('datos', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Metodo que insertara en la base de datos los datos recogidos del formulario
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incidencia = Incidencia::create([
            'trabajador' => $request['trabajador'],
            'descripcion' => $request['descripcion'],
            'fecha_incidencia' => $request['fecha_incidencia'],
            'user_id' => $request['user_id'],
            'estado' => $request['estado']
        ]);

        return redirect('/empleado');
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
     * Actualiza la incidencia pasada como parametro
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Busca una incidencia mediante el id
        $incidencia = Incidencia::find($id);
        //Comprueba si el estado de la incidencia es igual a 0, si lo es, cambia su estado a 1
        if ($incidencia->estado == 0) {
            $incidencia->estado = $request->input('estado');
        }
        //Se guarda la incidencia
        $incidencia->save();
        //Se redirige a la ruta principal del modulo de administracion
        return redirect('/administracion');
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
