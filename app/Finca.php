<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    //Campos de la tabla que se podran modificar
    protected $fillable = ['nombre', 'localizacion'];

    //Nombre de la tabla
    protected $table = 'fincas';

    //Funcion que se utilizara para acceder a los sectores de una finca
    public function sectores()
    {
        //Devuelve una relacion 1 a M relacionando la tabla fincas con la tabla sectores
        return $this->hasMany('App\Sector');
    }
}
