@extends('principal.index')
@section('contenido')
<div class="container formulario">
    <h1 class="h1 text-center mt-2">Nuevo empleado</h1>
    <form action="/administracion/empleados/empleado/store" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" required>
        </div>

        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" name="dni" id="dni" required>
        </div>
        <div class="form-group">
            <label for="email">Teléfono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" minlength="9" maxlength="9" required>
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
        <div class="row justify-content-between">
            <div class="col-3"></div>
            <button type="submit" class="btn boton col-3" id="add">Añadir</button>
            <div class="col-3"></div>
        </div>
    </form>
</div>
@endsection
