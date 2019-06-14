<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finca;
use App\Incidencia;
class FincasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fincas = Finca::paginate(10);
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['fincas' => $fincas, 'incidencias' => $incidencias];
        return view('administrador.fincas')->with('datos', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['incidencias' => $incidencias];
        return view('formularios.crearFinca')->with('datos', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $finca = Finca::create($request->all());

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
        $finca = Finca::find($id);
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['finca' => $finca, 'incidencias' => $incidencias];
        return view('formularios.actualizarFinca')->with('datos', $datos);
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
        $finca = Finca::find($id);
        $finca->nombre = $request->input('nombre');
        $finca->localizacion = $request->input('localizacion');
        $finca->save();
        return redirect('/administracion/fincas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finca = Finca::find($id);

        $finca->delete();

        return redirect('/administracion/fincas');
    }
}
