@extends('principal.index')
@section('contenido')
<div class="container formulario">
    <h1 class="text-center h1 mt-2">Nueva tarea</h1>
    <form action="/administracion/tareas/tarea/store" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" cols="30" rows="5" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="fecha_inicio">Fecha Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
            <label for="fecha_fin">Fecha Fin</label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="activa" selected>Activa</option>
                <option value="finalizada">Finalizada</option>
            </select>
        </div>
        <div class="row justify-content-between">
            <div class="col-3"></div>
            <button type="submit" class="btn boton col-3">Añadir</button>
            <div class="col-3"></div>
        </div>
    </form>
</div>
@endsection
