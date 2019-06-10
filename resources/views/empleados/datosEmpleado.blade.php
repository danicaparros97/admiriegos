@extends('principal.index')
@section('contenido')
    <p>Nombre</p>
    <p>{{ $datos['empleado']->nombre }}</p>
    <p>Apellidos</p>
    <p>{{ $datos['empleado']->apellidos }}</p>
    <p>Email</p>
    <p>{{ $datos['empleado']->email }}</p>
    <p>DNI</p>
    <p>{{ $datos['empleado']->dni }}</p>
    <p>Telefono</p>
    <p>{{ $datos['empleado']->telefono }}</p>
    <p>Email</p>
    <p>{{ $datos['empleado']->email }}</p>
    <p>Sector asignado</p>
    <p>{{ $datos['sector']->nombre }}</p>
    <p>Tarea asignada</p>
    <p>Nombre: {{ $datos['tarea']->nombre}}</p>
    <p>Descripción: {{ $datos['tarea']->descripcion}}</p>
    <p>Fecha inicio: {{ $datos['tarea']->fecha_inicio}}</p>
    <p>Fecha fin: {{ $datos['tarea']->fecha_fin}}</p>
    <p>Estado: {{ $datos['tarea']->estado}}</p>

    <a href="/administracion/pdf/{{ $datos['empleado']->id }}">Descargar pdf</a>
@endsection