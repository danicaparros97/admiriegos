@extends('principal.index')
@section('contenido')
<div class="container">
    <h2>Datos de usuario</h2>
    <h3>Nombre</h3>
    <p>{{ $datos['empleado']->nombre }}</p>
    <h3>Apellidos</h3>
    <p>{{ $datos['empleado']->apellidos }}</p>
    <h3>Email</h3>
    <p>{{ $datos['empleado']->email }}</p>
    <h3>DNI</h3>
    <p>{{ $datos['empleado']->dni }}</p>
    <h3>Telefono</h3>
    <p>{{ $datos['empleado']->telefono }}</p>
    <h3>Email</h3>
    <p>{{ $datos['empleado']->email }}</p>
    <h3>Sector asignado</h3>
    <p>{{ $datos['sector']->nombre }}</p>
    <h3>Tarea asignada</h3>
    <p>Nombre: {{ $datos['tarea']->nombre}}</p>
    <p>Descripción: {{ $datos['tarea']->descripcion}}</p>
    <p>Fecha inicio: {{ $datos['tarea']->fecha_inicio}}</p>
    <p>Fecha fin: {{ $datos['tarea']->fecha_fin}}</p>
    <p>Estado: {{ $datos['tarea']->estado}}</p>

    <a href="/administracion/pdf/{{ $datos['empleado']->id }}">Descargar pdf</a>
    @if (Auth::user()->rol == "administrador")
    <a href="/administracion/empleados/empleado/edit/{{ $datos['empleado']->id }}">Editar datos</a>
    @else
    <a href="/empleado/edit/{{ $datos['empleado']->id }}">Editar datos</a>
    @endif
</div>
@endsection
