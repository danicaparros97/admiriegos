<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = ['trabajador', 'descripcion', 'fecha_incidencia', 'user_id', 'estado'];

    public function empleados()
    {
        return $this->belongsTo('App\User');
    }
}
