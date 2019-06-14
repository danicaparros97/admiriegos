<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estado'];
    protected $table = 'tareas';

    public function users()
    {
        return $this->hasMany('App\User');
    }
}