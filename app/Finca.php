<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    protected $fillable = ['nombre', 'localizacion'];

    protected $table = 'fincas';

    public function sectores()
    {
        return $this->hasMany('App\Sector');
    }
}
