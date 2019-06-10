<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finca;

class FincasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fincas = Finca::all();
        return view('administrador.fincas')->with('fincas', $fincas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formularios.crearFinca');
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

        return view('formularios.actualizarFinca')->with('finca', $finca);
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
