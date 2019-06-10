<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;
use App\Sector;
use App\Tarea;

class PDFController extends Controller
{
     public function invoice($id) 
    {
        $empleado = User::find($id);
        $sector = Sector::where('id', $empleado->sector_id)->first();
        $tarea = Tarea::where('id', '=', $empleado->tarea_id)->first();
        $datos = ['empleado' => $empleado, 'sector' => $sector, 'tarea' => $tarea];
        
        $pdf = PDF::loadView('empleados.invoice', $datos);
        return $pdf->download('invoice.pdf');
    }

}
