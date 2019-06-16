<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    //Campos de la tabla que se podran modificar
    protected $fillable = ['nombre', 'finca_id'];

    //Funcion que se utilizara para aceder a la finca a la que pertenece un sector
    public function fincas()
    {
        return $this->belongsTo('App\Finca');
    }
    //Funcion que se utilizara para mostrar los empleados que tiene un sector
    public function empleados()
    {
        return $this->hasMany('App\User');
    }
}
