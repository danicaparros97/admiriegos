@extends('principal.index')
@section('contenido')
<div class="container formulario">
    <h1 class="h1 text-center mt-2">Nueva finca</h1>
    <form action="/administracion/fincas/finca/store" method="post" id="crearFinca">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="localizacion">Localizacion</label>
            <input type="text" class="form-control" name="localizacion" required>
        </div>
        <div class="row justify-content-between">
            <div class="col-3"></div>
            <button type="submit" class="btn boton col-3">Añadir</button>
            <div class="col-3"></div>
        </div>
    </form>
</div>
@endsection
