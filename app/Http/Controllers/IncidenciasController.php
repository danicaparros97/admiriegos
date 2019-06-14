<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Incidencia;

class IncidenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['incidencias' => $incidencias];
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
     * Store a newly created resource in storage.
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $incidencia = Incidencia::find($id);
        
        if ($incidencia->estado == 0) {
            $incidencia->estado = $request->input('estado');
        }
        $incidencia->save();
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
