<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Sector;
use App\Tarea;
use App\Incidencia;
class EmpleadosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = User::paginate(10);
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['empleados' => $empleados, 'incidencias' => $incidencias];
        return view('administrador.indexEmpleados')->with('datos', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::all();
        $tareas = Tarea::where('estado', 'activa')->get();
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['sectores' => $sectores, 'tareas' => $tareas, 'incidencias' => $incidencias];

        return view('formularios.crearEmpleado')->with('datos', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $correo = EmpleadosController::formatEmail($request['nombre'], $request['apellidos']);
        $password = EmpleadosController::formatPassword($request['nombre'], $request['apellidos']);

        $user = User::create([
            'nombre' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'dni' => $request['dni'],
            'telefono' => $request['telefono'],
            'rol' => $request['rol'],
            'sector_id' => $request['sector_id'],
            'tarea_id' => $request['tarea_id'],
            'email' => $correo,
            'password' => Hash::make($password)
        ]);

        $user->save();
        
        return redirect('/administracion/empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = User::find($id);
        $sector = Sector::where('id', $empleado->sector_id)->first();
        $tarea = Tarea::where('id', '=', $empleado->tarea_id)->first();
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['empleado' => $empleado, 'sector' => $sector, 'tarea' => $tarea, 'incidencias' => $incidencias];

        return view('empleados.datosEmpleado')->with('datos', $datos);
    }
    public function indexEmpleado()
    {
        $empleado = User::find(Auth::user()->id);
        $sector = Sector::where('id', $empleado->sector_id)->first();
        $empleadosSector = User::where('sector_id', $sector->id)->get();
        $tarea = Tarea::where('id', '=', $empleado->tarea_id)->first();
        $tareas = DB::table('tareas')->paginate(10);
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = [
            'empleado' => $empleado,
            'sector' => $sector, 
            'tarea' => $tarea, 
            'empleadosSector' => $empleadosSector,
            'tareas' => $tareas,
            'incidencias' => $incidencias
        ];
        
        return view('empleados.indexEmpleado')->with('datos', $datos);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = User::find($id);
        $sectores = Sector::all();
        $tareas = Tarea::where('estado', 'activa')->get();
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['empleado' => $empleado, 'sectores' => $sectores, 'tareas' => $tareas, 'incidencias' => $incidencias];
        return view('formularios.actualizarEmpleado')->with('datos', $datos);
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
        $empleado = User::find($id);
        $empleado->nombre = $request->input('nombre');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->telefono = $request->input('telefono');
        $empleado->dni = $request->input('dni');
        $empleado->rol = $request->input('rol');
        $empleado->sector_id = $request->input('sector_id');
        $empleado->tarea_id = $request->input('tarea_id');

        $empleado->save();

        return redirect('/administracion/empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = User::find($id);
        $empleado->delete();
        return redirect('/administracion/empleados');
    }

    public function formatEmail($nombre, $apellidos)
    {
        $nombre = strtolower($nombre);
        $apellidos = strtolower($apellidos);
        $nombre_completo = $nombre . ' ' . $apellidos;
        $correo = str_replace(' ', '.', $nombre_completo);
        $correo .= '@admiriegos.com';

        return $correo;
    }

    public function formatPassword($nombre, $apellidos)
    {
        $nombre = strtoupper($nombre);
        $apellidos = strtoupper($apellidos);

        $password = $nombre[0] . $apellidos[0] . date('dmY');

        return $password;
    }
}
