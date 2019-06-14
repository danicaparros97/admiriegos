@extends('principal.index')
@section('contenido')
<div class="container formulario">
    <h1 class="h1 text-center mt-2">Editar finca</h1>
    <form action="/administracion/fincas/finca/update/{{ $datos['finca']->id }}" method="post" id="crearFinca">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $datos['finca']->nombre}}" readonly>
        </div>
        <div class="form-group">
            <label for="localizacion">Localizacion</label>
            <input type="text" class="form-control" name="localizacion" value="{{ $datos['finca']->localizacion}}"
                required>
        </div>
        <div class="row justify-content-between">
            <div class="col-3"></div>
            <button type="submit" class="btn boton col-3">Añadir</button>
            <div class="col-3"></div>
        </div>
    </form>
</div>
@endsection
