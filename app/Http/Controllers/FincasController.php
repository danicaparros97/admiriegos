<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finca;
use App\Incidencia;
class FincasController extends Controller
{
    /**
     * Metodo que se llama en web.php que mostrara todas las fincas de la base de datos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Busca todas las fincas y las muestra paginadas
        $fincas = Finca::paginate(10);
        //Busca las incidencias que esten sin resolver
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['fincas' => $fincas, 'incidencias' => $incidencias];
        //Devuelve la vista con los datos pasados mediante el metodo with
        return view('administrador.fincas')->with('datos', $datos);
    }

    /**
     * Metodo que se llama en web.php que mostrara el formulario de insercion en la base de datos para las fincas
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se buscan las incidencias que tengan como estado sin resolver
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['incidencias' => $incidencias];
        //Se devuelve la vista con los datos pasados mediante el metodo with
        return view('formularios.crearFinca')->with('datos', $datos);
    }

    /**
     * Inserta en la base de datos los datos recogidos del formulario llamado mediante el metodo create
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        //Se inserta en la tabla Fincas, todos los resultados recogidos del formulario
        $finca = Finca::create($request->all());
        //Se redirige a la ruta que muestra todas las fincas
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
     * Muestra un formulario con los datos de una finca para poder editarla
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Busca una finca mediante el id
        $finca = Finca::find($id);
        //Busca las incidencias sin resolver
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['finca' => $finca, 'incidencias' => $incidencias];
        //Devuelve una vista con los datos pasados mediante el metodo with
        return view('formularios.actualizarFinca')->with('datos', $datos);
    }

    /**
     * Actualiza la finca que se ha llamado mediante el metodo edit
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Busca la finca mediante el id
        $finca = Finca::find($id);
        //Actualiza los datos de la finca con los valores recogidos del formulario
        $finca->nombre = $request->input('nombre');
        $finca->localizacion = $request->input('localizacion');
        //Se guardan los datos
        $finca->save();
        //Se redirige a la ruta que mostrara todas las fincas
        return redirect('/administracion/fincas');
    }

    /**
     * Elimina la finca pasada como parametro
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Se busca la finca mediante el id
        $finca = Finca::find($id);
        //Se elimina la finca encontrada
        $finca->delete();
        //Se devuelve la ruta que muestra todas las fincas
        return redirect('/administracion/fincas');
    }
}
