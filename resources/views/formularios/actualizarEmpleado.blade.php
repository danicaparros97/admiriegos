@extends('principal.index')
@section('contenido')
<div class="container">
    <form action="/administracion/empleados/empleado/update/{{ $datos['empleado']->id }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $datos['empleado']->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" value="{{ $datos['empleado']->apellidos }}"
                required>
        </div>
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" name="dni" value="{{ $datos['empleado']->dni }}" minlength="9"
                maxlength="9" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $datos['empleado']->email }}" readonly>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" name="telefono" value="{{ $datos['empleado']->telefono }}"
                minlength="9" maxlength="9" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select class="form-control" name="rol" required>
                <option>Encargado</option>
                <option>Regador</option>
                <option>Peón Agrícola</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sector_id">Asignar sector</label>
            <select class="form-control" name="sector_id" required>
                @foreach ($datos['sectores'] as $sector)
                <option value="{{ $sector->id }}"> {{ $sector->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tarea_id">Asignar tarea</label>
            <select class="form-control" name="tarea_id" required>
                @foreach ($datos['tareas'] as $tarea)
                <option value="{{ $tarea->id }}"> {{ $tarea->descripcion }} - {{ $tarea->estado }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>
</div>
@endsection
