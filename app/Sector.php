<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['nombre', 'idFinca'];

    //protected $table = 'sectores';

    public function fincas()
    {
        return $this->belongsTo('App\Finca');
    }

    public function empleados()
    {
        return $this->hasMany('App\User');
    }
}
