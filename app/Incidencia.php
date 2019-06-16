<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    //Campos que se podran modificar
    protected $fillable = ['trabajador', 'descripcion', 'fecha_incidencia', 'user_id', 'estado'];
    //Funcion que nos devolvera el empleado al que pertenece la incidencia
    public function empleados()
    {
        return $this->belongsTo('App\User');
    }
}
