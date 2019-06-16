<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //Campos de la tabla que se podran modificar
    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estado'];
    //Nombre de la tabla
    protected $table = 'tareas';

    //Funcion que se utilizara para acceder a los usuarios que tiene una tarea
    public function users()
    {
        return $this->hasMany('App\User');
    }
}