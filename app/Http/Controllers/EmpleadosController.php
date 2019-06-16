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
     * Metodo que se llamara en web.php al que se le pasan una serie de variables y estas se podran imprimir en la vista que se devuelve en el return
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se buscan todos los empleados paginando los resultados
        $empleados = User::paginate(10);
        //Se buscan todas las incidencias donde su estado sea 0, es decir, sin resolver
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['empleados' => $empleados, 'incidencias' => $incidencias];
        //Con with se le pasan los datos a la vista
        return view('administrador.indexEmpleados')->with('datos', $datos);
    }

    /**
     * Metodo que se llamara en web.php al que se le pasara una vista con unas variables que mostrara el formulario para insertar datos en la base de datos
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se buscan todos los sectores de la base de datos mediante el metodo all() del modelo Sector
        $sectores = Sector::all();
        //Se buscan todas las tareas de la base de datos donde su estado sea activa
        $tareas = Tarea::where('estado', 'activa')->get();
        //Se buscan todas las incidencias donde su estado sea 0, es decir, sin resolver
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['sectores' => $sectores, 'tareas' => $tareas, 'incidencias' => $incidencias];
        //Con with se le pasan los datso a la vista
        return view('formularios.crearEmpleado')->with('datos', $datos);
    }

    /**
     * Metodo que guardara los datos del formulario llamado con el metodo create y los insertara en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request Recoge los datos del formulario
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Se llaman a los metodos para crear el correo y la contraseña del empleado
        $correo = EmpleadosController::formatEmail($request['nombre'], $request['apellidos']);
        $password = EmpleadosController::formatPassword($request['nombre'], $request['apellidos']);
        //Se crea un empleado y se llama al metodo create del modelo User. Se rellenan los campos de la tabla Empleados con los datos recogidos del formulario
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
        //Se guarda el empleado
        $user->save();
        //Se redirige a la ruta donde apareceran todos los empleados
        return redirect('/administracion/empleados');
    }

    /**
     * Metodo que se llama en web.php al cual se le pasa como parametro el id del empleado que se quiere mostrar
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Se busca el empleado pasado como parametro mediante el metodo find
        $empleado = User::find($id);
        //Se busca el sector que su id sea igual al campo sector_id de la tabla empleados
        $sector = Sector::where('id', $empleado->sector_id)->first();
        //Se busca la tarea que su id sea igual al campo tarea_id de la tabla tareas
        $tarea = Tarea::where('id', '=', $empleado->tarea_id)->first();
        //Se buscan las incidencias que tengan como estado 0, es decir, sin resolver
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['empleado' => $empleado, 'sector' => $sector, 'tarea' => $tarea, 'incidencias' => $incidencias];
        //Se devuelve una vista con los datos pasados mediante el metodo with
        return view('empleados.datosEmpleado')->with('datos', $datos);
    }
    /**
     * Muestra la vista para la parte de empleado
     * 
     * @return \Illuminate\Http\Response
     */
    public function indexEmpleado()
    {
        //Busca los datos del empleado logeado
        $empleado = User::find(Auth::user()->id);
        //Busca el sector que tenga como id el campo sector_id de la tabla empleados
        $sector = Sector::where('id', $empleado->sector_id)->first();
        //Busca los empleados que tengan como sector_id el id del sector
        $empleadosSector = User::where('sector_id', $sector->id)->get();
        //Busca las tareas que tengan como id el campo tarea_id de la tabla empleados
        $tarea = Tarea::where('id', '=', $empleado->tarea_id)->first();
        //Muestra las tareas paginadas
        $tareas = DB::table('tareas')->paginate(10);
        //Muestra las tareas con estado sin resolver
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = [
            'empleado' => $empleado,
            'sector' => $sector, 
            'tarea' => $tarea, 
            'empleadosSector' => $empleadosSector,
            'tareas' => $tareas,
            'incidencias' => $incidencias
        ]; 
        //Devuelve una vista con los datos pasados mediante el metodo with
        return view('empleados.indexEmpleado')->with('datos', $datos);
    }
    /**
     * Metodo que se llama en web.php al que se le pasa un id de un empleado para que muestre un formulario con los datos de ese empleado para poder modificarlo
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Se busca al empleado mediante el id pasado como parametro
        $empleado = User::find($id);
        //Se buscan todos los sectores
        $sectores = Sector::all();
        //Se buscan las tareas que tengan como estado activa
        $tareas = Tarea::where('estado', 'activa')->get();
        //Se buscan las incidencias que tengan como estado 0, es decir, sin resolver
        $incidencias = Incidencia::where('estado', 0)->get();
        $datos = ['empleado' => $empleado, 'sectores' => $sectores, 'tareas' => $tareas, 'incidencias' => $incidencias];
        //Se devuelve una vista con los datos
        return view('formularios.actualizarEmpleado')->with('datos', $datos);
    }

    /**
     * Metodo que se llama en web.php y actualiza el empleado que se ha llamado mediante el metodo edit
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Se busca el empleado mediante el metodo find
        $empleado = User::find($id);
        //Se actualizan los datos del empleado que sean necesarios
        $empleado->nombre = $request->input('nombre');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->telefono = $request->input('telefono');
        $empleado->dni = $request->input('dni');
        $empleado->rol = $request->input('rol');
        $empleado->sector_id = $request->input('sector_id');
        $empleado->tarea_id = $request->input('tarea_id');
        //Se guarda el empleado
        $empleado->save();
        //Se redirecciona a la ruta donde se muestran todos los empleados
        return redirect('/administracion/empleados');
    }

    /**
     * Se elimina el empleado pasado como parametro de la base de datos
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Se busca el empleado pasado como parametro mediante el metodo find
        $empleado = User::find($id);
        //Se elimina el empleado
        $empleado->delete();
        //Se redirige a la ruta donde se muestran los empleados
        return redirect('/administracion/empleados');
    }

    /**
     * Metodo que se encarga de generar un correo con el formato nombre.apellido1.apellido2@admiriegos.com con el nombre y los apellidos pasados como parametro
     * 
     * @param string $nombre
     * @param string $apellidos
     * 
     */
    public function formatEmail($nombre, $apellidos)
    {
        //Convierta a minuscula tanto el nombre como el apellido
        $nombre = strtolower($nombre);
        $apellidos = strtolower($apellidos);
        //Se concatenan el nombre y el apellido
        $nombre_completo = $nombre . ' ' . $apellidos;
        //Se reemplazan los espacios por un .
        $correo = str_replace(' ', '.', $nombre_completo);
        //Se le añade @admiriegos.com
        $correo .= '@admiriegos.com';
        //Devuelve el correo
        return $correo;
    }
    /**
     * Metodo que se encarga de generar una contraseña con el formato NADDMMYYYY con el nombre y apellidos pasados como parametro y la fecha actual
     * 
     * @param string $nombre
     * @param string $apellidos
     */
    public function formatPassword($nombre, $apellidos)
    {
        //Se convierten a mayuscula tanto el nombre como los apellidos
        $nombre = strtoupper($nombre);
        $apellidos = strtoupper($apellidos);
        //Coge la primera letra del nombre y la primera letra de los apellidos y la concatena con la fecha actual con el formato dmY
        $password = $nombre[0] . $apellidos[0] . date('dmY');
        //Devuelve la contraseña 
        return $password;
    }
}
