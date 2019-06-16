<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;
use App\Sector;
use App\Tarea;

class PDFController extends Controller
{
    /**
     * Crea un pdf con los datos de un empleado y lo descarga
     * 
     * @param int $id
     */
     public function invoice($id) 
    {
        //Busca un empleado mediante el id
        $empleado = User::find($id);
        $sector = Sector::where('id', $empleado->sector_id)->first();
        $tarea = Tarea::where('id', '=', $empleado->tarea_id)->first();
        $datos = ['empleado' => $empleado, 'sector' => $sector, 'tarea' => $tarea];
        //Carga una vista pasandole los datos
        $pdf = PDF::loadView('empleados.invoice', $datos);
        //Descarga el pdf con los datos del empleado
        return $pdf->download('invoice.pdf');
    }

}
