@extends('principal.index')
@section('contenido')
<div class="container">
    <form action="/empleados/empleado/add" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre">
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos">
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select class="form-control" id="rol">
                <option>Encargado</option>
                <option>Regador</option>
                <option>Peón Agrícola</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sector_id">Sector Asignado</label>
            <select class="form-control" id="sector_id">
                @foreach ($sectores as $sector)
                <option value="{{ $sector->id }}"> {{ $sector->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>
</div>
@endsection
