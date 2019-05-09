<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = ['descripcion', 'fecha_inicio', 'fecha_fin', 'finalizada'];
}
