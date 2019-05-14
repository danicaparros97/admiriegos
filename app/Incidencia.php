<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = ['descripcion', 'fecha_incidencia', 'idEmpleado', 'leida'];

    public function empleados()
    {
        return $this->belongsTo('App\User');
    }
}
