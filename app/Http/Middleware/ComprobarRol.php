<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class ComprobarRol
{
    /**
     * Comprueba si el usuario logeado es administrador, si lo es, lo redirige a /administracion, si no, lo redirige a /empleado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->rol == 'administrador') {
            return $next($request);
        }
        return redirect('/empleado');
    }
}
