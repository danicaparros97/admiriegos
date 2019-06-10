@extends('principal.index')
@section('contenido')
<div class="container">
    <form action="/administracion/tareas/tarea/store" method="post">
        @csrf
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="fecha_inicio">Fecha Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
            <label for="fecha_fin">Fecha Fin</label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control">
                <option value="activa" selected>Activa</option>
                <option value="finalizada">Finalizada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>
</div>
@endsection