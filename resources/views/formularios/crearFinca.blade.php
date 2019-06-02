@extends('principal.index')
@section('contenido')
<div class="container">
    <form action="/enc/fincas/finca/store" method="post" id="crearFinca">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="form-group">
            <label for="localizacion">Localizacion</label>
            <input type="text" class="form-control" name="localizacion">
        </div>
        <input type="submit" value="Añadir" class="btn btn-primary">
    </form>
</div>
@endsection