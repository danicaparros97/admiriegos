<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'empleados';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellidos', 'dni', 'telefono','rol', 'sector_id', 'tarea_id', 'email', 'password'
    ];

    public function sectores()
    {
        return $this->belongsTo('App\Sector');
    }

    public function incidencias()
    {
        return $this->hasMany('App\Incidencia');
    }

    public function tareas(){
        return $this->belongsTo('App\Tarea');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
