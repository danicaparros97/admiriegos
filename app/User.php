<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //Nombre de la tabla
    protected $table = 'empleados';
    //Campos de la tabla que se podran modificar
    protected $fillable = [
        'nombre', 'apellidos', 'dni', 'telefono','rol', 'sector_id', 'tarea_id', 'email', 'password'
    ];
    //Funcion que devolvera el sector al que pertenece el empleado
    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }
    //Funcion que devolvera las incidencias que tiene un empleado
    public function incidencias()
    {
        return $this->hasMany('App\Incidencia');
    }
    //Funcion que devolvera la tarea a la que pertenece el empleado
    public function tarea(){
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
